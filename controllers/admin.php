<?php

jumpToSigninFormIfNotExistsUser();

$action = $_GET['a'] ?? '';

require_once "models/admin/admin.php";

$AdminModel  = new AdminModel();

switch ($action) {
    case 'create-account': {
        if (isset($_POST['submit'])) {
            $AdminModel->createUser();
        }
        $khoa        = $AdminModel->getList("khoa");
        $khoaHoc     = $AdminModel->getList("khoa_hoc");
        $lopBienChe  = (new Database())->table("lop_bien_che")->orderBy("ten_lop")->selectAll();
        break;
    }
    case 'create-class': {
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
            $AdminModel->updateLopHocPhan();
        }
        $giangVien   = $AdminModel->getListTeachers();
        $lopHocPhan  = $AdminModel->getClassList();
        break;
    }
    case 'view-te':
        $list =  $AdminModel->getListTeachers();
        break;
    case 'view-st': {
        $list = $AdminModel->getListStudents();
        break;
    }
    case 'view-st-top': {
        $list = $AdminModel->getListStudentsTop(2);
        break;
    }
    case '': default: {
        $userInfo = $AdminModel->getAdmin($userSession->id);
        break;
    }
}
require_once "views/admin/index.php";
