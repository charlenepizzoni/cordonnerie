<?php
	require_once('verifCookie.php');
	
	$template = $twig->loadTemplate('accueilAdmin.twig');

    echo $template->render(array(
	'moteur_name' => 'Twig'
    )); 
?>