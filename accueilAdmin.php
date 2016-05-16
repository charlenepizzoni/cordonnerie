<?php
	require_once('twig.php');
	require_once('dao/token.php');

	if(isset($_COOKIE['token'])) {
		$token = $_COOKIE['token'];
		echo $token;
		if ((Token::tokenExist($token)) && (Token::pasPerime($token))){
   			$template = $twig->loadTemplate('accueilAdmin.twig');
		} else{
			$template = $twig->loadTemplate('connexion.twig');
		}
	} else {
		$template = $twig->loadTemplate('connexion.twig');
	}


    echo $template->render(array(
	'moteur_name' => 'Twig'
    )); 
?>