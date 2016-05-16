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

		} else {
			$error = true;
		}
	} else {
		$error = true;
	}


	if ($error) {
		$template = $twig->loadTemplate('commandeAdmin.twig');
	}
	

    echo $template->render(array(
	'moteur_name' => 'Twig'
    )); 

?>