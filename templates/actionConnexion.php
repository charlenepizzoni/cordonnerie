<?php
	require_once(twig.php);
	require_once(donnees/adminDAO.php);

	// if coockieExist
	//else
		if (isset($_POST['name']) && isset($_POST['password'])) {
			$adminName = $_POST['name'];
			$password = $_POST['password'];
			$adminDAO = new AdminDAO();
			$admin = $adminDAO->getByUsernName($adminName);
			if (($admin != null) and (hash($password) == $admin->password)) {
				//TODO
			    // generate a token
			    //enregistrer le token dans cookie
			    // saveCookie
			    $nom = $admin->name;
			    require_once('adminHome.php')
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