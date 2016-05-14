<?php

	class service{
		private  $ids;
		private  $idCat;
		private  $nom;
		private  $libelle;

		public function __construct($ids, $idCat, $nom, $libelle){
			$this->ids = $ids;
			$this->idCat = $idCat;
			$this->nom = $nom;
			$this->libelle = $libelle;
		}

	/*		
	    public static function getByName($name) {
		    $db = Db::getInstance();
		    $name = mysql_real_escape_string($name);
		    $req = $db->query("SELECT * FROM ADMIN where NAMEA=".$name);
			foreach($req->fetchAll() as $admin) {
		    	$res = new Admin($admin['IDA'], $admin['NAMEA'], $post['PASSWORDA']);
		    } // it should have ONLY 1 admin object
	      	return $res;
	    }

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
