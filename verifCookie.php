<?php
	require_once('twig.php');
	require_once('dao/token.php');
	if(isset($_COOKIE['token'])) {
		$token = $_COOKIE['token'];
		if (!((Token::tokenExist($token)) && (Token::pasPerime($token)))){
			require_once('connexion.php');
			die();
		}
	} else {
		require_once('connexion.php');
		die();
	}

