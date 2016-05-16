<?php
	require_once('bd.php');

	class Commande{
		private  $idcom;
		private  $idCat;
		private  $num;
		private  $etat;

		public function __construct($idcom, $idCat, $num, $etat){
			$this->idc = $idcom;
			$this->idCat = $idCat;
			$this->num = $num;
			$this->etat = $etat;
		}

	    public function getByNum($num) {
		    $bd = bd::getInstance();
		    $req = $bd->prepare("SELECT * FROM COMMANDE where NUMC=?;");
		    $req->execute([$num]);
			$res = $req->fetch();
			$commande = new Commande($res['IDCOM'], $res['IDCAT'], $res['NUMC'], $res['ETATC']);
	      	return $commande;
	    }

	    public static function addCommande($num, $etat) {
		    $bd = bd::getInstance();
		    $req = $bd->prepare("INSERT INTO COMMANDE(NUMC, ETATC) VALUES (?, UPPER(?));");
		    $req->execute([$num, $etat]);
		    print_r([$num, $etat]);
		}

	    public static function addCommandeCat($num, $etat, $idcat) {
		    $bd = bd::getInstance();
		    $req = $bd->prepare("INSERT INTO COMMANDE(NUMC, ETATC, IDCAT) VALUES (?, UPPER(?), ?);");
		    $req->execute([$num, $etat, $idcat]);
		}

		public static function exist($numero) {
			$bd = bd::getInstance();
		    $req = $bd->prepare("SELECT count(*) as nb FROM COMMANDE WHERE NUMC = ?");
		    $req->execute([$numero]);
		    $res = $req->fetch();
		    return ($res['nb']!=0);
		}
	
		public static function updateEtat($numero, $nouvelEtat) {
			$bd = bd::getInstance();
		    $req = $bd->prepare("UPDATE COMMANDE SET ETATC=[?] WHERE NUMC=?");
		    $req->execute([$nouvelEtat, $numero]);			
		}

		public static function actualiser($numero, $etat) {
			if (Commande::exist($numero)) {
				Commande::updateEtat($numero, $etat);
			} else {
				Commande::addCommande($numero, $etat);
				echo 'devrait avoir ajouter';
				echo $numero;
			}
		}

		public static function supprimer($numero){
			echo 'salutlol je vais suprrimer';
			$bd = bd::getInstance();
		    $req = $bd->prepare("DELETE FROM COMMANDE WHERE NUMC=?");
		    $req->execute([$numero]);		
		    echo'  le valeur ';
		    echo $numero;	
		}

	}

?>
