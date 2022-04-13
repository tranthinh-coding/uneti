<?php

$action = $_GET['a'] ?? '';

switch ($action) {
    case "signout": {
        require_once "models/inc/signout.inc.php";
        redirect("/");
        break;
    }
    case "signin": {
        require_once "models/inc/signin.inc.php";
        redirect("/");
        break;
    }
    case '': default: {
        if ($userSession) redirect("/?c=$userSession->extra");
        require_once "models/database.php";
        $extras = (new Database("uneti"))->table("extra")->selectAll();
        require_once "views/signin.php";
        exit();
        break;
    }
}
