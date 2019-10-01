<?php


/*
Plik - authentication.class.php
uzytkownik klika zaloguj, wysyła get request->controler wyłapuje, laduje model-> logincheck.class.php: połącznenie z bazą, ustawienie metod dostepowych get i set user, password, validacja pól, hash hasła, funkcja login pobiera z innego pliku, jeśli znaleziono użytkownika - ustawiamy sesje, zamykamy połaczenie z bazą. 

plik - logout.class.php 
funkcja wylogowująca uzytkownika i niszcząca sesje

plik - token.class.php
ustawienie sesji z randomowym tokenem i uzycie jej w formularzu, nastepnie porównanie obydwu i danie odpowiedzi 
*/



