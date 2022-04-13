<?php

require_once "models/database.php";

class AdminModel {
    /**
     * @return bool
     */
    private function checkSubmitAndServerPost(): bool {
        return $_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit']);
    }

    /**
     * @param $to
     * @param ...$data
     * @return void
     */
    private function checkDataValid($to, ...$data): void {
        foreach($data as $val) {
            if (!$val && $val !== 0) {
                setFlashMessage("flash-message", "Dữ liệu không hợp lệ");
                redirect($to);
            }
        }
    }

    /**
     * @param $mysqliResult
     * @return array|false
     */
    private function convertToArray($mysqliResult) {
        if ($mysqliResult) {
            $res = [];
            foreach ($mysqliResult as $each) {
                $res[] = $each;
            }
            return $res;
        }
        return false;
    }

    /**
     * @param $adId
     * @return false|object|null
     */
    public function getAdmin($adId) {
        return (new Database())
            ->table('admin')
            ->selectId($adId);
    }

    /**
     *
     * @return void
     */
    public function endSemester($class): void
    {
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

    /**
     * @return array|false
     */
    public function getListTeachers() {
        $result = (new Database())
            ->selectCustom(
                "SELECT a.*, t.ten_khoa FROM giang_vien as a 
                    LEFT JOIN khoa t ON a.ma_khoa = t.id
                    ORDER BY a.ten"
            );
        return $this->convertToArray($result);
    }

    /**
     * @return array|false
     */
    public function getClassList() {
        $result = (new Database())
            ->selectCustom(
                "SELECT lhp.ma_khoa, mh.ten_mon_hoc_phan as ten_mon, lbc.ten_lop FROM lop_hoc_phan lhp
                LEFT JOIN mon_hoc_phan mh ON lhp.ma_mon_hoc_phan = mh.id
                LEFT JOIN lop_bien_che lbc ON lhp.ma_lop_bien_che = lbc.id;"
            );
        return $this->convertToArray($result);
    }

    /**
     * @return array|false
     */
    public function getListStudents($limit = 10) {
        $result = (new Database())
            ->selectCustom(
                "SELECT a.*, kh.ten_khoa, lbc.ten_lop, k.ten_khoa as khoa
                    FROM (SELECT * FROM sinh_vien LIMIT $limit) as a 
                    LEFT JOIN khoa k ON a.ma_khoa = k.id
                    LEFT JOIN khoa_hoc kh ON a.ma_khoa_hoc = kh.id
                    LEFT JOIN lop_bien_che lbc ON a.ma_lop_bien_che = lbc.id
                    ORDER BY a.ten"
            );
        return $this->convertToArray($result);
    }

    /**
     * @param $table
     * @return array|false
     */
    public function getList($table) {
        $result = (new Database())
            ->table($table)
            ->selectAll();
        return $this->convertToArray($result);
    }

    /**
     * @return void
     */
    public function createUser(): void {
        if ($this->checkSubmitAndServerPost()) {
            $type           = testInput($_POST["ty"]);
            $firstname      = testInput($_POST['firstname']);
            $lastname       = testInput($_POST['lastname']);
            $birthday       = testInput($_POST['birthday']);
            $gender         = testInput($_POST['gender']);
            $department     = testInput($_POST['department']);
            $this->checkDataValid("/?c=0&a=create-account", $type, $firstname, $lastname, $birthday, $gender, $department);
            $data = [
                'ten' => "'$lastname'",
                'ho' => "'$firstname'",
                'ngay_sinh' => "'$birthday'",
                'gioi_tinh' => (string)$gender,
                'ma_khoa' => (string)$department
            ];
            $db = new Database();
            if ($type === "st") {
                $db->table("sinh_vien");
                $course         = testInput($_POST['course']);
                $payroll        = testInput($_POST['payroll']);
                $this->checkDataValid("/?c=0&a=create-account", $course, $payroll);
                $data += ['ma_khoa_hoc' => (string)$course,
                    'ma_lop_bien_che' => (string)$payroll];
            } else if ($type === "te") {
                $db->table("giang_vien");
            } else {
                redirect("/?c=0&a=create-account");
            }
            $db->create($data);
            setFlashMessage("flash-message", "Tạo tài khoản thành công");
            redirect("/?c=0&a=create-account");
        }
    }

    /**
     * @return false|object|null
     */
    public function searchUser() {
        $type = $_GET['ty'] ?? '';
        $db = new Database();
        if ($type === 'st') {
            $db->table("sinh_vien");
        } else if ($type === 'te') {
            $db->table("giang_vien");
        }
        $uid = $_POST['id'] ?? null;
        if ($uid) {
            return $db->selectId($uid);
        }
        return false;
    }

    /**
     * @return void
     */
    public function updateLopHocPhan(): void {
        if ($this->checkSubmitAndServerPost()) {
            $teacher = testInput($_POST['teacher']);
            $payroll = testInput($_POST['class-section']);
            $this->checkDataValid('/?c=0&a=ud', $teacher, $payroll);

            (new Database())->table("lop_hoc_phan")->update($payroll, [
                'ma_giang_vien' => $teacher
            ]);
            setFlashMessage("flash-message", "Phân lớp thành công");
        }
        redirect("/?c=0&a=ud");
    }

    /**
     * @return void
     */
    public function createClass(): void {
        if ($this->checkSubmitAndServerPost()) {
            $department     = testInput($_POST['department']);
            $teacherID      = testInput($_POST['teacher']);
            $payroll        = testInput($_POST['payroll']);
            $course         = testInput($_POST['course']);
            $subject        = testInput($_POST['subject']);

            $this->checkDataValid("/?c=0&a=create-class", $department, $payroll, $course);
            $data = [
                "ma_lop_bien_che" => $payroll,
                'khoa_hoc' => $course,
                'ma_mon_hoc_phan' => $subject,
                'ma_khoa' => $department
            ];
            if ($teacherID) {
                $data["ma_giang_vien"] = $teacherID;
            }
            (new Database())->table('lop_hoc_phan')->create($data);
            setFlashMessage("flash-message", "Tạo lớp học phần thành công");
        }
        redirect("/?c=0&a=create-class");
    }
}
