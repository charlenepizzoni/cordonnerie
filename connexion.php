<?php
    include_once('twig.php');

    $template = $twig->loadTemplate('connexion.twig');
    echo $template->render(array(
	'moteur_name' => 'Twig'
    ));

?>