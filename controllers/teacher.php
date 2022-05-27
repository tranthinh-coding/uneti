<?php

$action = $_GET['a'] ?? '';

jumpToSigninFormIfNotExistsUser();

require_once "models/teacher/teacher.php";

$userInfo = (new TeacherModel)->getTeacherInfo($userSession->id);

$teacher = new TeacherModel();
switch ($action) {
	case "save-score": {
		$class = $_GET['class'];
		$depart = $_GET['de'];
        $teacher->saveScoreStudent($class, $depart);
		redirect("/?c=1&a=view&de=$depart&class=$class");
		break;
	}
	case "finish": {
		$class = $_GET['class'];
		$depart = $_GET['de'];
        $teacher->saveScoreStudent($class, $depart);

        $teacher->finishClassSection($class, $userSession->id);
		redirect("/?c=1&a=view&class=$class&de=$depart");
		break;
	}
	case 'view': {
		$depart = $_GET['de'];
		$class = $_GET['class'];
		$listStudent = $teacher->getListStudent($class);
        $statusClass = $teacher->getStatus($class)[0]['trang_thai'];
        $res = $teacher->getListClass($userSession->id);
        // $res = (new TeacherModel)->getDepartment($userSession->id);
        require_once "views/teacher/index.php";
        break;
	}
    case 'find-bad-score': {
        $class = $_GET['class'];
        $depart = $_GET['de'];
        $listStudent = $teacher->findBadStudents($class);
        $statusClass = $teacher->getStatus($class)[0]['trang_thai'];

        require_once "views/teacher/index.php";
        break;
    }
    case 'find-good-score': {
        $class = $_GET['class'];
        $depart = $_GET['de'];
        $listStudent = $teacher->findGoodStudents($class);
        $statusClass = $teacher->getStatus($class)[0]['trang_thai'];

        require_once "views/teacher/index.php";
        break;
    }
    case 'reset-class': {
        $class = $_GET['class'];
        $depart = $_GET['de'];
        $teacher->resetClassSeccion($class);
        redirect("/?c=1&a=view&class=$class&de=$depart");
        break;
    }
	case '':
	default: {
		$res = $teacher->getListClass($userSession->id);
		// $res = $teacher->getDepartment($userSession->id);
		require_once "views/teacher/index.php";
		break;
	}
}
