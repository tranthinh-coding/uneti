<?php
require_once "views/flashMessage.php";
?>

<div style="display: flex; width:100%">
    <?php
    require_once "views/admin/navbar.php";

    switch($action) {
        case 'create-account': {
            require_once "views/admin/insertForm.php";
            break;
        }
        case 'create-class': {
            require_once "views/admin/createClass.php";
            break;
        }
        case 'ud': {
            require_once "views/admin/updateTeacherClass.php";
            break;
        }
        case 'view-te': {
            require_once "views/admin/listTeacher.php";
            break;
        }
        case 'view-st': {
            require_once "views/admin/listStudent.php";
            break;
        }
        default: {
            break;
        }
    }
    ?>
</div>
