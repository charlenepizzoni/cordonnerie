<?php
	require_once('bd.php');
	class Admin{
		public  $idA;
		public  $name;
		public  $password;

		public function __construct($idA, $name, $password){
			$this->idA = $idA;
			$this->name = $name;
			$this->password = $password;
		}

			
	    public function getByName($name) {
		    $bd = bd::getInstance();
		    $req = $bd->prepare("SELECT * FROM ADMIN where NAMEA=?;");
		    $req->execute([$name]);
			$res = $req->fetch();
			$admin = new Admin($res['IDA'], $res['NAMEA'], $res['PASSWORDA']);
	      	return $admin;
	    }

	    // To add into db
	    public static function encoderPassword($password){
	    	return password_hash($password);
	    }

	    public static function addAdmin($name, $password){
	    	$bd = bd::getInstance();
		    $name = mysql_real_escape_string($name);
		    $req = $bd->query("INSERT INTO 'ADMIN'('IDA','NAMEA','PASSWORDA') VALUES (NULL,".$name.",".encoderPassword($password).")");
	    }

	    // to connect
	    public function verifierPassword($password){
	    	return ($password==$this->password);
	    }

	    public static function verifierAdmin($username, $password){
	    	$admin = getByName($username);
	    	return ($admin->verifierPassword($password));
	    }
	}

?>
