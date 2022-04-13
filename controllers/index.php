<?php
session_start();

require_once "middleware/UseUser.php";
require_once "function.php";

$userSession = UseUser();

$controller = $_GET["c"] ?? $userSession->extra ?? "sy";

function checkUserExist() {
    global $userSession, $controller;
    if ($userSession && $controller !== $userSession->extra && $controller !== "sy") {
        redirect("/?c=$userSession->extra");
    }
}

switch ($controller) {
    case "2": {
        checkUserExist();
        require_once "student.php";
        break;
    }
    case "1": {
        checkUserExist();
        require_once "teacher.php";
        break;
    }
    case "0": {
        checkUserExist();
        require_once "admin.php";
        break;
    }
    case "sy": {
        checkUserExist();
        require_once "system.php";
        break;
    }
    default: {
        checkUserExist();
        redirect("/");
        break;
    }
}
