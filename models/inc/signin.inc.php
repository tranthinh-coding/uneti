<?php
session_start();

require_once "../../function.php";
require_once "../../models/database.php";
require_once "../../middleware/UseUser.php";
require_once "../../models/database.php";

$db = new Database();

$existUser = UseUser();

if ($existUser->id) {
  $e = $existUser->extra;
  redirect("?c=$e");
}

function invalidInput($account, $pass, $extra) {
  if (!$account || !$pass || !$extra) {
    setFlashMessage("flash-message", "Tài khoản hoặc mật khẩu không hợp lệ");
    redirect("?e=er");
  }
}
function cannotQueryUser($result) {
  if (mysqli_num_rows($result) != 1) {
    setFlashMessage("flash-message", "Tài khoản hoặc mật khẩu không chính xác");
    redirect("/");
  }
}
function getUser($account, $pass, $extra) {
  global $db;
  return $db->table("tai_khoan")
    ->selectField([ 
      "tai_khoan" => "$account", 
      "mat_khau" => "$pass",
      "extra" => "$extra"
    ]);
}
function setSessionUser($userInfo, $extra) {
  $_SESSION['user_firstname'] = $userInfo->ho;
  $_SESSION['user_lastname']  = $userInfo->ten;
  $_SESSION['user_birthday']  = $userInfo->ngay_sinh;
  $_SESSION['user_extra']     = $extra;
}

function handleSuccess($extra) {
  setFlashMessage("flash-message", "Đăng nhập thành công");
  redirect("?c=$extra");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
  $account = testInput($_POST["account"]);
  $pass    = testInput($_POST["password"]);
  $extra   = testInput($_POST["extra"]);

  invalidInput($account, $pass, $extra);
  $result = getUser($account, $pass, $extra);  
  cannotQueryUser($result);

  $account = mysqli_fetch_assoc($result);
  $_SESSION['user_id'] = $account['tai_khoan'];

  if ($account['extra'] == 2) {
    $db->table("sinh_vien");
  }  else if ($account['extra'] == 1) {
    $db->table("giang_vien");
  }

  $userInfo = $db->selectId($account['tai_khoan']);

  setSessionUser($userInfo, $extra);
  handleSuccess($extra);
} 

redirect("/");
