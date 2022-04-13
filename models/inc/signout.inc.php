<?php

if (isset($_SESSION["user_id"])) {
    unset($_SESSION["user_id"]);
    unset($_SESSION["user_firstname"]);
    unset($_SESSION["user_lastname"]);
    unset($_SESSION["user_birthday"]);
}

redirect("/");
