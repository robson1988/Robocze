<?php

class CheckSession {

  function logedUser() { //Sprawdzenie czy sesja zalogowanego użytkownika istnieje i jaka jest rola użytkownika aby można było go przekierować do odpowiedniego panelu (1 * 24 * 60 * 60 )

    if($_SESSION['loged-in'] == false) {
      header('Location: zamow-diete');
      exit();
    } else {
      //sprawdzenie czy sesja nadal jest ważna
      $currentTime = mktime();
      $currentTime > $_SESSION['session-end-time'] ? $_SESSION['loged-in'] = false : $_SESSION['loged-in'] = true;

      //jeśli wygasła ustawiamy wiadomość z informacją o zakończonej sesji
      if($_SESSION['loged-in'] == false) {
        $_SESSION['msg_error'] = "Twoja sesja wygasła. Zaloguj się ponownie";
        header('Location: zamow-diete');
        exit();
      } elseif(isset($_SESSION['loged-in']) && $_SESSION['loged-in'] == true && $_SESSION['user-role'] == 'admin') {
        header('Location: admin-fitbox');
        exit();
      } else {}
    }
  }

  function checkUserIsLogedIn() { //sprawdzenie na stronie zamówienia czy użytkownik jest zalogowany

      if(isset($_SESSION['loged-in']) && $_SESSION['loged-in'] == true && $_SESSION['user-role'] == 'admin') {
        header('Location: admin-fitbox');
        exit();
      } elseif(isset($_SESSION['loged-in']) && $_SESSION['loged-in'] == true && $_SESSION['user-role'] == 'klient') {
        header('Location: panel-klienta');
        exit();
      } else {}
    }

  function logedUserOrderButton() { //sprawdzamy sesję czy użytkownik jest zalogowany, podmieniamy link w przycisku do panelu zamówień jeśli jest zalogowany

    if(isset($_SESSION['loged-in']) && $_SESSION['loged-in'] == true) {
      echo "panel-klienta";
    } else {
      echo "zamow-diete";
    }
  }
}
