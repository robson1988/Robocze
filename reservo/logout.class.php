<?php

public function logout() {
	
	$_SESSION = array();
	session_destroy();
}
