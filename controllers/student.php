<?php

$action = $_GET['a'] ?? '';

jumpToSigninFormIfNotExistsUser();

switch ($action) {
case '': default: {
  require_once "models/student/student.php";
  $userInfo = (new StudentModel)->getStudent($userSession->id);
  $scoreInfos  = (new StudentModel)->getScoreInfo($userSession->id);
  require_once "views/student/index.php";
  break;
}
}
