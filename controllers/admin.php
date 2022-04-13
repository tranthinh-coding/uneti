<?php

jumpToSigninFormIfNotExistsUser();

$action = $_GET['a'] ?? '';

require_once "models/admin/admin.php";
switch ($action) {
    case 'create-account': {
        $AdminModel  = new AdminModel();
        if (isset($_POST['submit'])) {
            $AdminModel->createUser();
        }
        $khoa        = $AdminModel->getList("khoa");
        $khoaHoc     = $AdminModel->getList("khoa_hoc");
        $lopBienChe  = (new Database())->table("lop_bien_che")->orderBy("ten_lop")->selectAll();
        break;
    }
    case 'create-class': {
        $AdminModel  = new AdminModel();
        if (isset($_POST['submit'])) {
            $AdminModel->createClass();
        }
        $khoa        = $AdminModel->getList('khoa');
        $giangVien   = $AdminModel->getListTeachers();
        $monHocPhan  = $AdminModel->getList('mon_hoc_phan');
        $lopBienChe  = $AdminModel->getList("lop_bien_che");
        $khoaHoc     = $AdminModel->getList("khoa_hoc");
        break;
    }
    case 'ud': {
        if (isset($_POST['submit'])) {
            (new AdminModel)->updateLopHocPhan();
        }
        $giangVien   = (new AdminModel)->getListTeachers();
        $lopHocPhan  = (new AdminModel)->getClassList();
        break;
    }
    case 'view-te':
        $list =  (new AdminModel())->getListTeachers();
        break;
    case 'view-st': {
        $list = (new AdminModel())->getListStudents(20);
        break;
        break;
    }
    case '': default: {
        $userInfo = (new AdminModel)->getAdmin($userSession->id);
        break;
    }
}
require_once "views/admin/index.php";
