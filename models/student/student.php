<?php

require_once "models/database.php";

class StudentModel {
    function getStudent($uid) {
        return (new Database())->table('sinh_vien')->selectId($uid);
    }

    function getScoreInfo($uid) {
        $scoreQuery = (new Database())
            ->table('diem_hoc_phan')
            ->selectCustom(
                "SELECT a.*, m.ten_mon_hoc_phan, m.so_tin_chi
                FROM (
                    SELECT * FROM diem_hoc_phan
                    WHERE ma_sinh_vien = $uid
                ) a 
                JOIN mon_hoc_phan as m 
                on m.id = a.ma_mon_hoc_phan");
        if ($scoreQuery) {
            $scoreInfos = [];
            while ($each = mysqli_fetch_object($scoreQuery)) {
                $scoreInfos[] = $each;
            }
            return $scoreInfos;
        }
        return false;
    }
}

