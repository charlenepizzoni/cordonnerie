<?php
	require_once('twig.php');
	require_once('dao/admin.php');
	require_once('dao/token.php');
	if (isset($_POST['name']) && isset($_POST['password'])) {
		$adminName = $_POST['name'];
		$password = $_POST['password'];
		$admin = new Admin();
		$admin = $admin->getByName($adminName);
		if (($admin != null) && ($admin->verifierPassword($password))) {
			$value = Token::genererToken($password);
			$endDate = time()+60*60*12; // on veut que notre token soit valable 12h
			$token = new Token(null, $admin->name, $value, $endDate);
		    setcookie('token', "'".$value."'", ($endDate));
		    $nom = $admin->name;
		    $template = $twig->loadTemplate('accueilAdmin.twig');
		} else {
		    $template = $twig->loadTemplate('connexion.twig');
		} 
	} else {
		$template = $twig->loadTemplate('connexion.twig');
	} 
	echo $template->render([]);
?>