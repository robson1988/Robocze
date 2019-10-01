<?php

session_start();

class Token {
	public function generate() {
		$_SESSION['token'] = md5(rand());	
		return $_SESSION['token'];
	}
	
	public function check() {
		if($_SESSION['token'] === $_POST['token']) {
			$_SESSION = array();
			return true;
			} else {
			return false;
		}

}
}


