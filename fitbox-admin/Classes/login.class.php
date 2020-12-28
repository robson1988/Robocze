<?php

class Login extends Dbh {

private $email;
private $password;
private $active;

public function loginUser($email, $password) {
      $secretKey = "6LftKa8ZAAAAAEXTKOCs0C6LgQoIN9hDDqirOkiC"; // recapcha secret key
      $checkKey = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response'].'');
      $capchaResult = json_decode($checkKey);
      if($capchaResult->success == false) {
        $_SESSION['msg_error'] = "Błąd recapcha";
        header("Location: zamow-diete");
        exit();
      } else {

        if (empty($email) || empty($password)) {
          $_SESSION['msg_error'] = "Uzupełnij wszystkie wymagane pola!";
          header("Location: zamow-diete");
          exit();
          } else {
          $sql = "SELECT * FROM users WHERE user_email='$email'";

          $stmt = $this->connect()->prepare($sql);

          $stmt->execute();

          $resultCheck = $stmt->rowCount();

          if ($resultCheck < 1) {
            $_SESSION['msg_error'] = "Login lub hasło są niepoprawne 1.";

            $this->connection = null;

            header("Location: zamow-diete");
            exit();

          } else {
            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

              $active = $row['user_active'];
              if($active == 0) {
                $_SESSION['msg_error'] = "Konto nie zweryfikowane. Aktywuj konto zanim się zalogujesz";

                $this->connection = null;

                header("Location: zamow-diete");
                exit();

              } else {
              //Sprawdzenie poprawności hasła
              $hashedPwdCheck = password_verify($password, $row['user_password']);
              if($hashedPwdCheck == false ){
               $_SESSION['msg_error'] = "Login lub hasło są niepoprawne.";

               $this->connection = null;
               header("Location: zamow-diete");
               exit();

             } elseif ($hashedPwdCheck == true ) {
                //Zaloguj użytkownika

                $_SESSION['loged-in'] = true;
                $_SESSION['user-id'] = $row['user_id'];
                $_SESSION['user-email'] = $row['user_email'];
                $_SESSION['user-role'] = $row['user_role'];

                //długosc sesji zalogowanego uzytkownika to 24h, pozniej sesja jest niszczona
                $_SESSION['session-start-time'] = mktime();
                $_SESSION['session-end-time'] = $_SESSION['session-start-time'] + (1 * 24 * 60 * 60);

                $this->connection = null;
                if($_SESSION['user-role'] == 'admin') {
                  header("Location: admin-fitbox");
                  exit();
                  } else {
                    header("Location: panel-klienta");
                    exit();
                  }
                }
              }
            }
          }
        }
      }
    }
  }
