<?php
class Sanitize {

	public function sanitizeInput($value) { //funkcja czyszcząca inputa

	$value = trim($value);
	$value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
	$value = stripslashes($value);

	return($value);

	}
}
