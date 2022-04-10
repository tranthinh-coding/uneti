<?php

$action = $_GET['a'] ?? '';

switch ($action) {
case '': default: {
  require "models/student/student.php";
  $studentInfo = (new StudentModel)->getUser($userSession->id);
  require "views/student/index.php";
  break;
}
}
