<?php
session_start();

include_once "../../Classes/db.class.php";
include_once "../../Classes/login.class.php";
include_once "../../Classes/sanitize.class.php";


if($_SERVER['REQUEST_METHOD'] != 'POST') {
  header("Location: zamow-diete");
  exit();
  } else {

    $security = new Sanitize();

    $email = $security -> sanitizeInput($_POST['email']);
    $password = $security ->sanitizeInput($_POST['haslo']);

    $loginCheck = new Login();
    $loginCheck->loginUser($email, $password);

  }
