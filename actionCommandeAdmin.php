<?php
	require_once('verifCookie.php');
	require_once('dao/commande.php');

	if (isset($_POST['numero']) && isset($_POST['action'])) {
		if ($_POST['action'] == 'valider') {
			if (isset($_POST['etat'])) {
				$numero = $_POST['numero'];
				$etat = $_POST['etat'];
				Commande::actualiser($numero, $etat);
				$error = false;
			} else {
				$error = true;
			}
		} elseif($_POST['action'] == 'supprimer'){
			$numero = $_POST['numero'];
			echo 'coucou';
			Commande::supprimer($numero);
			$error = false;
		} else {
			$error = true;
		}
	} else {
		$error = true;
	}

	$template = $twig->loadTemplate('commandeAdmin.twig');

	if ($error) {
		echo $template->render(array(
			'codeRetour' => 'Pas assez de paramettres, veuillez recommencer.'
    	)); 
	} else {
		echo $template->render(array(
			'codeRetour' => 'Les modifications ont bien été réalisées !'
    	)); 
	}
	 

?>