<?php
require_once "models/database.php";

$db = new Database();

$existUser = UseUser();

if ($existUser) {
  $e = $existUser->extra;
  redirect("/?c=$e");
}

function invalidInput($account, $pass, $extra) {
  if (!$account || !$pass || $extra == null) {
    setFlashMessage("flash-message", "Tài khoản hoặc mật khẩu không hợp lệ");
    redirect("/");
  }
}
function cannotQueryUser($arr) {
  if (count($arr) != 1) {
    setFlashMessage("flash-message", "Tài khoản hoặc mật khẩu không chính xác");
    redirect("/");
  }
}
function getUser($account, $pass, $extra) {
  global $db;
  return $db->table("tai_khoan")
    ->selectByField([
      "tai_khoan" => "$account", 
      "mat_khau" => "$pass",
      "extra" => "$extra"
    ]);
}
function setSessionUser($uid, $userInfo, $extra) {
  $_SESSION['user_id']        = $uid;
  $_SESSION['user_name']      = $userInfo->ho . " " . $userInfo->ten;
  $_SESSION['user_lastname']  = $userInfo->ten;
  $_SESSION['user_birthday']  = $userInfo->ngay_sinh;
  $_SESSION['user_extra']     = $extra;
}
function handleSuccess($extra) {
  setFlashMessage("flash-message", "Đăng nhập thành công");
  redirect("?c=$extra");
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
  $account = testInput($_POST["account"]);
  $pass    = testInput($_POST["password"]);
  $extra   = testInput($_POST["extra"]);

  invalidInput($account, $pass, $extra);
  $account = getUser($account, $pass, $extra);
  cannotQueryUser($account);

  switch ($account[0]['extra']) {
      case 1: {
          $db->table("giang_vien");
          break;
      }
      case 2: {
          $db->table("sinh_vien");
          break;
      }
      case 0: {
          $db->table("admin");
          break;
      }
      default: {
          redirect("/");
      }
  }

  $userInfo = $db->selectId($account[0]['tai_khoan']);

  setSessionUser($account[0]['tai_khoan'], $userInfo, $extra);
  handleSuccess($extra);
}
redirect("/");
