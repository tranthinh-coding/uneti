<?php

require_once "models/database.php";

class TeacherModel
{
	/**
	 * @return bool
	 */
	private function checkSubmitAndServerPost(): bool
	{
		return $_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit']);
	}

	/**
	 * @param $tid
	 * @return false|object|null
	 */
	public function getTeacherInfo($tid)
	{
		return (new Database())
			->table("giang_vien")
			->selectId($tid);
	}

    /**
     * @param $tid
     * @return false|string|void
     */
	public function getListClass($tid)
    {
		$result = (new Database())
			->selectCustom("SELECT
      lp.ma_khoa, 
      khoa.ten_khoa,
      lp.id as ma_lop, 
      mh.ten_mon_hoc_phan AS ten_mon,
      lbc.ten_lop as ten_lop
      FROM
        (SELECT * FROM lop_hoc_phan WHERE ma_giang_vien = $tid) lp
      JOIN khoa ON lp.ma_khoa = khoa.id
      JOIN mon_hoc_phan mh ON mh.id = lp.ma_mon_hoc_phan
      JOIN lop_bien_che lbc ON lbc.id = lp.ma_lop_bien_che;");

		if ($result === false) {
			return json_encode(["error" => 'null']);
		}
		$res = [];
		while ($each = mysqli_fetch_assoc($result)) $res[] = $each;
		if (!empty($res)) {
			return json_encode($res, JSON_UNESCAPED_UNICODE);
		}
		// return (new Database())
		//   ->table('lop_hoc_phan')
		//   ->selectByField([
		//     'ma_giang_vien' => $tid
		//   ]);
	}

    /**
     * @param $tid
     * @return false|string
     */
	public function getDepartment($tid)
	{
		$result = (new Database())
			->selectCustom("SELECT 
                      lhp.ten_lop_hoc_phan, 
                      lhp.ma_khoa, lhp.id AS ma_lop_hoc_phan, 
                      khoa.ten_khoa, 
                      lop_bien_che.ten_lop AS ten_lop_bien_che
                    FROM 
                      (SELECT * FROM lop_hoc_phan WHERE ma_giang_vien = $tid) AS lhp
                    JOIN khoa ON lhp.ma_khoa = khoa.id
                    JOIN lop_bien_che ON lhp.ma_lop_bien_che = lop_bien_che.id");

		$res = [];
		while ($each = mysqli_fetch_assoc($result)) {
            $res[] = $each;
        }
		if ($res) {
			return json_encode($res, JSON_UNESCAPED_UNICODE);
		}
		return json_encode(["error" => 'null']);
	}

    /**
     * @param $class
     * @param $depart
     * @return void
     */
	public function saveScoreStudent($class, $depart): void
    {
		if ($this->checkSubmitAndServerPost()) {
			// Lay diem trong form ve mot array sau do insert: id => typescore -> score
			$arr = [];
			foreach ($_POST as $key => $value) {
				$filedId = explode("-", $key);
				$id = end($filedId);
				$filed = $filedId[0];
				$column = '';
				if (!isset($arr[$id])) {
					$arr[$id] = [];
				}
				switch ($filed) {
					case 'hs1': {
							$column = "he_so_1";
							break;
						}
					case 'hs2': {
							$column = "he_so_2";
							break;
						}
					case 'cc': {
							$column = "diem_chuyen_can";
							break;
						}
					case 'thi': {
							$column = "diem_thi";
							break;
						}
				}
				if ($value < 0 || $value > 10) {
					setFlashMessage("flash-message", "Xuất hiện điểm không hợp lệ. Sinh viên id = $id");
					redirect("/?c=1&a=view&class=$class&de=$depart");
				}
				if ($value || $value == '0') {
					$arr[$id] += [$column => $value];
				}
			}
			foreach ($arr as $key => $val) {
				if ($val != 0 && empty($val)) {
					unset($arr[$key]);
				}
			}
			$db = new Database();
			$db->table('diem_hoc_phan');
			if (empty($arr)) return;
			foreach ($arr as $id => $studentScore) {
				$valArr = [];
				forEach($studentScore as $col => $score) {
					$valArr += [$col => $score];
				}
				$db->update($valArr, 
					['ma_sinh_vien' => $id, 'ma_lop_hoc_phan' => $class]
				);
			}
			setFlashMessage("flash-message", "Cập nhật điểm thành công");
		}
	}

    /**
     * @param $class
     * @param $tid
     * @return void
     */
	public function finishClassSection($class, $tid): void
    {
		(new Database())
			->table("lop_hoc_phan")
			->update([ 'trang_thai' => 0 ], [ 'id' => $class, 'ma_giang_vien' => $tid ]);
			
		$str = "UPDATE diem_hoc_phan 
		SET he_so_1 = CASE 
			WHEN he_so_1 IS NULL THEN 0 
			ELSE he_so_1
			END,
		he_so_2 = CASE 
			WHEN he_so_2 IS NULL THEN 0 
			ELSE he_so_2
			END,
		diem_chuyen_can = CASE 
			WHEN diem_chuyen_can IS NULL THEN 10 
			ELSE diem_chuyen_can
			END,
		diem_thi = CASE 
			WHEN diem_thi IS NULL THEN 0 
			ELSE diem_thi
			END,
		diem_qua_trinh = (he_so_1 + 2 * he_so_2) / 3,
		diem_tong_ket = diem_thi * 0.6 + diem_qua_trinh * 0.4,
		tong_ket_he_4 = CASE
			WHEN diem_tong_ket >= 8.5  THEN 4.0
			WHEN diem_tong_ket >= 8.0 AND diem_tong_ket < 8.5 THEN 3.5
			WHEN diem_tong_ket >= 7.0 AND diem_tong_ket < 8.0 THEN 3.0
			WHEN diem_tong_ket >= 6.5 AND diem_tong_ket < 7.0 THEN 2.5
			WHEN diem_tong_ket >= 5.5 AND diem_tong_ket < 6.5 THEN 2.0
			WHEN diem_tong_ket >= 5.0 AND diem_tong_ket < 5.5 THEN 1.5
			WHEN diem_tong_ket >= 4.0 AND diem_tong_ket < 5.0 THEN 1.0
			ELSE 0
			END,
		xep_loai = CASE 
			WHEN diem_tong_ket >= 8.5 THEN 'A'
			WHEN diem_tong_ket >= 7.0 AND diem_tong_ket < 8.5 THEN 'B'
			WHEN diem_tong_ket >= 5.5 AND diem_tong_ket < 7.0 THEN 'C'
			WHEN diem_tong_ket >= 4.0 AND diem_tong_ket < 5.5 THEN 'D'
			ELSE 'F'
			END
		WHERE 
		ma_lop_hoc_phan = $class;";		

		(new Database())
			->table('lop_hoc_phan')
			->selectCustom($str);
	}

    /**
     * @param $class
     * @return array
     */
    public function getStatus($class): array
    {
        return (new Database())
            ->table('lop_hoc_phan')
            ->selectByField(['id' => $class], ['trang_thai']);
    }

    /**
     * @param $class
     * @return array|false
     */
	public function getListStudent($class)
	{
		$db = new Database();
		$resultQuery = $db->selectCustom("SELECT d.ma_sinh_vien,
                        sv.ho, 
                        sv.ten,
                        d.he_so_1, 
                        d.he_so_2, 
                        d.diem_chuyen_can, 
                        d.diem_qua_trinh,
                        d.diem_thi, 
                        d.xep_loai,
                        d.diem_tong_ket,
                        d.tong_ket_he_4
                      FROM
                      (SELECT * FROM diem_hoc_phan
                        WHERE ma_lop_hoc_phan = $class) AS d
                      JOIN sinh_vien AS sv
                      ON d.ma_sinh_vien = sv.id
                      ORDER BY sv.ten");
		if ($resultQuery) {
			$res = [];
			foreach ($resultQuery as $each) {
				$res[] = $each;
			}
			return $res;
		}
		return false;
	}
}
