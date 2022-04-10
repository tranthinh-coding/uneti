<?php
function redirect($to) {
    header("Location: " . $to);
    exit();
}

function testInput($data) : string {
    $data = trim($data);
    return htmlspecialchars($data);
}

function setFlashMessage($key, $message) {
    $_SESSION[$key] = $message;
}

function getFlashMessage($key) {
    if (isset($_SESSION[$key])) {
        $value = $_SESSION[$key];
        unset($_SESSION[$key]);
        return $value;
    }
    return false;
}
