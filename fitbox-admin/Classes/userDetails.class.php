<?php

class User extends Dbh {

protected function getUser($userId) {

	$sql = "SELECT user_password FROM users WHERE user_id = '$userId'";

	$stmt = $this->connect()->prepare($sql);

	$stmt->execute();

	$count = $stmt->rowCount();

	$this->connection = null;

	if($count < 1) {

		$row = '';
		return $row;

		} else {

			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			$this->connection = null;

			return $row;

		}
	}

	protected function updateUser($userId, $hashedPwd) {

		$date = date('Y-m-d H:i:s');

		$sql = "UPDATE users	SET
		user_password = '$hashedPwd',
		user_pass_update = '$date'
		WHERE user_id = '$userId'";

		$stmt = $this->connect()->prepare($sql);

		$stmt->execute();

		$this->connection = null;

		// sprawdza czy udało się nadpisać rekord, dodajemy wiadomość i przekierowujemy na odpowiednią stronę
		$count = $stmt->rowCount();

		if($count > 0 ){

			$result = true;
      return $result;

    } else {

			$result = false;
			return $result;

    }
	}
}

class UserDetails extends Dbh {

protected function getUserDetails($userId) {

	$sql = "SELECT * FROM user_details WHERE user_id = '$userId'";

	$stmt = $this->connect()->prepare($sql);

	$stmt->execute();

	$count = $stmt->rowCount();

	$this->connection = null;

	if($count < 1) {

		$row = '';
		return $row;

		} else {

			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			$this->connection = null;

			return $row;
		}
	}

	protected function updateUserDetails($userDetails) {

		$sql = "UPDATE user_details	SET
		user_name = '$userDetails[1]',
		user_surname = '$userDetails[2]',
		user_street = '$userDetails[3]',
		user_street_number = '$userDetails[4]',
		user_flat_number = '$userDetails[5]',
		user_postcode = '$userDetails[6]',
		user_city = '$userDetails[7]',
		user_phone = '$userDetails[8]'
		WHERE user_id = '$userDetails[0]'";

		$stmt = $this->connect()->prepare($sql);

		$stmt->execute();

		$this->connection = null;

		$count = $stmt->rowCount(); // sprawdza czy udało się nadpisać rekord, dodajemy wiadomość i przekierowujemy na odpowiednią stronę

		if($count > 0 ){

			$result = true;
      return $result;

    } else {

			$result = false;
			return $result;

    }
	}
}
