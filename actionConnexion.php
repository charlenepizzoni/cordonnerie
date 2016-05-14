<?php
	require_once('twig.php');
	require_once('dao/admin.php');

	// if coockieExist
	//else
		if (isset($_POST['name']) && isset($_POST['password'])) {
			$adminName = $_POST['name'];
			$password = $_POST['password'];
			$admin = new Admin();
			$admin = $admin->getByName($adminName);
			if($admin == null){
				$template = $twig->loadTemplate('pasDadmin.twig');
			}elseif ($admin->verifierPassword($password)) {
				//TODO
			    // generate a token
			    //enregistrer le token dans cookie
			    // saveCookie
			    $nom = $admin->name;
			    require_once('adminHome.php');
			} else {
			    $template = $twig->loadTemplate('errorConnexion.twig');
			} 
		} else {
			$template = $twig->loadTemplate('connexion.twig');
		} 


    echo $template->render(array('password'=> $admin->password, 'nom'=>$admin->name)); 
?>