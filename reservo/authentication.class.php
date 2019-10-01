<?php

include_once "token.class.php";


if(Token::check() === true) {
	
	echo "działa";
} else {
	echo "lipca";
}