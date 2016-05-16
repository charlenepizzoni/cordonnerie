<?php
	require_once('verifCookie.php');
	
	$template = $twig->loadTemplate('adminAdmin.twig');

    echo $template->render(array(
	'moteur_name' => 'Twig'
    )); 

?>