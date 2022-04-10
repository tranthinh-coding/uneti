<?php
function UseUser() {
  if (! isset($_SESSION['user_id']))  return false;

  return (object)[
    'id' => $_SESSION["user_id"],
    'firstName' => $_SESSION["user_firstname"],
    'lastName' => $_SESSION["user_lastname"],
    'birthday' => $_SESSION['user_birthday'],
    'extra' => $_SESSION['user_extra']
  ];
}
