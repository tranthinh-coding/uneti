<?php
session_start();

require_once "middleware/UseUser.php";
require_once "function.php";

function jumpToSigninForm() {
  require_once "models/database.php";
  $extras = (new Database("uneti"))->table("extra")->offset(1)->selectAll();
  require_once "views/signin.php";
}
$userSession = UseUser();
if (! $userSession) {
  jumpToSigninForm();
}
else {
  $controller = $_GET["c"] ?? $userSession->extra;
  
  switch ($controller) {
  case "2": {
    require_once "student.php";
    break;
  }
  case "1": {
    require_once "teacher.php";
    break;
  }
  case "0": {
    require_once "admin.php";
    break;
  }
  case '': default: {
    jumpToSigninForm();
    break;
  }
  }
}
