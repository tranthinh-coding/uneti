<?php

$action = $_GET['a'] ?? '';

jumpToSigninFormIfNotExistsUser();

require_once "models/teacher/teacher.php";

$userInfo = (new TeacherModel)->getTeacherInfo($userSession->id);

switch ($action) {
	case "save-score": {
		$class = $_GET['class'];
		$depart = $_GET['de'];
		(new TeacherModel)->saveScoreStudent($class, $depart);
		redirect("/?c=1&a=view&de=$depart&class=$class");
		break;
	}
	case "finish": {
		$class = $_GET['class'];
		$depart = $_GET['de'];
		(new TeacherModel)->finishClassSection($class, $userSession->id);
		redirect("/?c=1&a=view&class=$class&de=$depart");
		break;
	}
	case 'view': {
		$depart = $_GET['de'];
		$class = $_GET['class'];
		$listStudent = (new TeacherModel)->getListStudent($class);
        $statusClass = (new TeacherModel)->getStatus($class)[0]['trang_thai'];
	}
	case '':
	default: {
		$res = (new TeacherModel)->getListClass($userSession->id);
		// $res = (new TeacherModel)->getDepartment($userSession->id);
		require_once "views/teacher/index.php";
		break;
	}
}
