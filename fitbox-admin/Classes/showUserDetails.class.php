<?php

class ShowUserDetails extends UserDetails {

	public function viewUserDetails($userId) {

		$row = $this->getUserDetails($userId);

		if(empty($row)) {

			$result = false;
			return $result;

		} else {

		$_SESSION['user-name'] = $row['user_name'];
		$_SESSION['user-surname'] = $row['user_surname'];
		$_SESSION['user-street'] = $row['user_street'];
		$_SESSION['user-street-number'] = $row['user_street_number'];
		$_SESSION['user-flat-number'] = $row['user_flat_number'];
		$_SESSION['user-postcode'] = $row['user_postcode'];
		$_SESSION['user-city'] = $row['user_city'];
		$_SESSION['user-phone'] = $row['user_phone'];

		}
}

	public function updatedUserDetails($userDetails) {

		$result = $this->updateUserDetails($userDetails);

		if($result == false) {
			$_SESSION['msg_error'] = "Nie udało się zaaktualizować twoich danych. Spróbuj ponownie.";
			header('Location: panel-klienta');
			exit();
		} else {
			$_SESSION['msg_success'] = "Dane zostały zaaktualizowane.";
			header('Location: panel-klienta');
			exit();
		}

		}

}
