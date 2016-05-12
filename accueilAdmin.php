<?php
	include_once('twig.php');

	$template = $twig->loadTemplate('accueilAdmin.twig');

    echo $template->render(array(
	'moteur_name' => 'Twig'
    )); 
?>