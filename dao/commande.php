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
		    $req = $bd->prepare("INSERT INTO COMMANDE('NUMC', 'ETATC') VALUES ([?], [?]);");
		    $req->execute([$num, $etat]);
		}

	    public static function addCommande($num, $etat, $idcat) {
		    $bd = bd::getInstance();
		    $req = $bd->prepare("INSERT INTO COMMANDE('NUMC', 'ETATC', 'IDCAT') VALUES ([?], [?], [?]);");
		    $req->execute([$num, $etat, $idcat]);
		}

		public static function exist($numero) {
			$bd = bd::getInstance();
		    $req = $bd->prepare("SELECT count(*) FROM COMMANDE WHERE ETAT = UPPER(?)");
		    $req->execute([$numero]);
		    $res = $req->fetch();
		}
	
		public static actualiser($numero, $etat) {
			$commande = getByNum($numero);


			$bd = bd::getInstance();
			$req = $bd->prepare("SELECT * FROM COMMANDE where NUMC=?;");
		    $req->execute([$num]);
			// si elle existe, l'actualiser,

			// sinon, la creer
		}
	}

?>
