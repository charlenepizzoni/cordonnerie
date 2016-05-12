<?php
	include_once('twig.php');


	if (isset($_POST['username']) && isset($_POST['password'])) {
	  $username = $_POST['username'];
	  $password = $_POST['password'];
	  // Faire quelque chose avec, genre vérifier
	  if (verifierAdmin($username, $password)) {
	    require_once('accueilAdmin.php')
	  } else {
	    require_once('errorConnexion.php');
	  }
	} else {
		require_once('connexion.php')
	}
    echo $template->render(array(
	'moteur_name' => 'Twig'
    )); 
?>