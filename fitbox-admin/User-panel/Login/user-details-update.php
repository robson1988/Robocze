<?php
session_start();

include_once "../../Classes/db.class.php";
include_once "../../Classes/checkSession.class.php";
include_once "../../Classes/sanitize.class.php";
include_once "../../Classes/userDetails.class.php";
include_once "../../Classes/showUserDetails.class.php";

if($_SERVER['REQUEST_METHOD'] != 'POST') {
  header("Location: panel-klienta");
  exit();
  } else {

    //sprawdzenie czy sesja jest dalej aktualna
    $isLogedIn = new CheckSession;
    $isLogedIn->logedUser();

    //zabezpieczenie przed sql injection
    $security = new Sanitize;
    $userId = $security ->sanitizeInput($_POST['id']);
    $userName = $security ->sanitizeInput($_POST['name']);
    $userSurname = $security ->sanitizeInput($_POST['surname']);
    $userStreet = $security ->sanitizeInput($_POST['street']);
    $userStreetNumber = $security ->sanitizeInput($_POST['house-num']);
    $userFlatNumber = $security ->sanitizeInput($_POST['flat-num']);
    $userPostcode = $security ->sanitizeInput($_POST['postcode']);
    $userCity = $security ->sanitizeInput($_POST['city']);
    $userPhone = $security ->sanitizeInput($_POST['phone-num']);

    //array z danymi użytkownika
    $userDetails = array($userId, $userName, $userSurname, $userStreet, $userStreetNumber, $userFlatNumber,$userPostcode, $userCity, $userPhone);

    //aktualizacja danych użytkownika
    $updateDetails = new ShowUserDetails;
    $updateDetails->updatedUserDetails($userDetails);

  }
