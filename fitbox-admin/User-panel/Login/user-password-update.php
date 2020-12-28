<?php
session_start();

include_once "../../Classes/db.class.php";
include_once "../../Classes/checkSession.class.php";
include_once "../../Classes/sanitize.class.php";
include_once "../../Classes/userDetails.class.php";
include_once "../../Classes/resetPassword.class.php";

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
    $oldPassword = $security ->sanitizeInput($_POST['password']);
    $newPassword = $security ->sanitizeInput($_POST['new-password']);
    $newPasswordRepeat = $security ->sanitizeInput($_POST['repeat-password']);

    //skrypt validujący inputy do dopisania

    //sprawdzenie czy nowe hasła są identyczne
    if($newPassword !== $newPasswordRepeat) {

      $_SESSION['msg_error'] = "Nowe hasła nie są takie same. Spróbuj ponownie.";
      header('Location: panel-klienta');
      // $response = ['bool' => false, 'result' => 'Nowe hasła nie są takie same. Spróbuj ponownie.'];
      // header('Content-type: application/json');
      // echo json_encode($response);
      exit();

    } else {

      //porównanie starego hasła z hasłem w bazie
      $comparePassword = new CheckPassword;
      $result = $comparePassword->checkUserPassword($oldPassword, $userId);

      if($result !== true) {

        $_SESSION['msg_error'] = "Twoje stare hasło jest niepoprawne. Spróbuj ponownie.";
        header('Location: panel-klienta');
        exit();

      } else {

        //zmiana hasła na nowe
        $changePassword = new RessetPassword;
        $result = $changePassword->updateUserPassword($userId, $newPassword);

        if($result !== true) {

          $_SESSION['msg_error'] = "Błąd przy zmianie hasła. Spróbuj ponownie.";
          header('Location: panel-klienta');
          exit();

        } else {

          $_SESSION['msg_success'] = "Hasło zostało zmienione.";
          header('Location: panel-klienta');
          // $response = ['bool' => true, 'result' => 'Hasło zostało zmienione.'];
          // header('Content-type: application/json');
          // echo json_encode($response);
          exit();

        }
      }
   }
}
