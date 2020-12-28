<?php

class CheckPassword extends User {
//porównuje hasło z bazy z wprowadzonym hasłem w panelu administracyjnym
public function checkUserPassword($oldPassword, $userId) {

		$row = $this->getUser($userId);

		 if(empty($row)) {

			 $result = false;
			 return $result;

		 } else {

			$dbPassword = $row['user_password'];

			$hashedPwdCheck = password_verify($oldPassword, $dbPassword);

			if($hashedPwdCheck == false) {

					$result = false;
					return $result;

			} else {

				$result = true;
				return $result;

			}
		}
	}
}


class RessetPassword extends User {

public function updateUserPassword($userId, $newPassword) {

		//hashujemy nowe hasło użytkownika
		$hashedPwd = password_hash($newPassword, PASSWORD_DEFAULT);

		$result = $this->updateUser($userId, $hashedPwd);

		if($result == false) {

				$result = false;
				return $result;

		} else {

			$result = true;
			return $result;

		}
	}
}
