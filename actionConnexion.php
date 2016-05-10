<?php
	include_once('twig/lib/Twig/Autoloader.php');
    Twig_Autoloader::register();
    
    $loader = new Twig_Loader_Filesystem('templates'); // Dossier contenant les templates
    $twig = new Twig_Environment($loader, array(
      'cache' => false
    ));


	if (isset($_POST['username']) && isset($_POST['password'])) {
	  $username = $_POST['username'];
	  $password = $_POST['password'];
	  // Faire quelque chose avec, genre vérifier
	  if (verifier($username, $password)) {
	    $template = $twig->loadTemplate('accueilAdmin.twig');
	  } else {
	    $template = $twig->loadTemplate('errorConnexion.twig');
	  }
	} else {
		$template = $twig->loadTemplate('connexion.twig');
	}
    echo $template->render(array(
	'moteur_name' => 'Twig'
    )); 
?>