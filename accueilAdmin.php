<?php
	include_once('twig.php');

	if(!isset($_COOKIE['token'])) {
   		$template = $twig->loadTemplate('connexion.twig');
	} else {
		$template = $twig->loadTemplate('accueilAdmin.twig');
	}


    echo $template->render(array(
	'moteur_name' => 'Twig'
    )); 
?>