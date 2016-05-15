<?php

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
	/*		

	    // To add into db
	    public static function encoderPassword($password){
	    	return password_hash($password);
	    }

	    public static function addAdmin($name, $password){
	    	$db = Db::getInstance();
		    $name = mysql_real_escape_string($name);
		    $req = $db->query("INSERT INTO 'ADMIN'('IDA','NAMEA','PASSWORDA') VALUES (NULL,".$name.",".encoderPassword($password).")");
	    }

	    // to connect
	    public function verifierPassword($password){
	    	return password_verify($password, $this->password);
	    }

	    public static function verifierAdmin($username, $password){
	    	$admin = getByName($username);
	    	return ($admin->verifierPassword($password));*/
	    }
	}

?>
