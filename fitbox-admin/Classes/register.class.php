<?php

class Register extends DbH {

public function registerNewUser($email, $password) {

	$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

	$sql = "INSERT INTO users (user_id, user_email, user_password,user_status, user_account_active) VALUES
	('', '$email' , '$hashedPwd','user', '0')";

	$stmt = $this->connect()->prepare($sql);

	$stmt->execute();

	$count = $stmt->rowCount();

	$this->connection = null;

	if($count == 0) {

		echo "nie udało się";

		header('Location:zaloguj');

		exit();

		} else {

		echo "sukces";

		}
	}
}
