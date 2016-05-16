<?php
	require_once('verifCookie.php');

	$template = $twig->loadTemplate('commandeAdmin.twig');

    echo $template->render(array(
	'moteur_name' => 'Twig'
    )); 

?>