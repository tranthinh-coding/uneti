<?php

require_once "models/database.php";
require_once "function.php";

/**
 * Mục tiêu update điểm tổng kết theo từng lớp
 * @param string $class
 * @return void
 */
function endSemester(string $class): void
{
    // lay ra thong tin so tin chi, diem tong ket, ma sinh vien duoc group by theo ma lop
    // Muc tieu: Update diem tong ket cua sinh vien theo từng lớp
    $sql = "SELECT
            dhp.ma_sinh_vien as msv, 
            SUM(mh.so_tin_chi) AS stc, 
            SUM(dhp.diem_tong_ket) AS dtk
        FROM (
            SELECT * FROM diem_hoc_phan
            WHERE ma_lop_hoc_phan = $class
        ) dhp
        JOIN mon_hoc_phan mh ON mh.id = dhp.ma_mon_hoc_phan
        GROUP BY (dhp.ma_sinh_vien);";

    $students = (new Database())->selectCustom($sql);

    $db = new Database();
    $db->table("diem_trung_binh");

    foreach ($students as $student) {
        $row = $db->selectByField(['ma_sinh_vien' => $student['msv']]);

        $dtbX = $student['dtk'] / $student['stc'];
        $dtbIv = $dtbX * 4 / 10;
        if (count($row) === 0) {
            $db->create([
                'ma_sinh_vien' => $student['msv'],
                'diem_tb_hoc_ky_X' => $dtbX,
                'diem_tb_hoc_ky_IV' => $dtbIv,
            ]);
        } else if (count($row) === 1) {
            $db->update([
                'diem_tb_hoc_ky_X' => $dtbX,
                'diem_tb_hoc_ky_IV' => $dtbIv,
            ], ['ma_sinh_vien' => $student['msv']]);
        }
    }
}


