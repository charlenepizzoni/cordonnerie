<?php
	require_once('bd.php');
	class Admin{
		public  $idA;
		public  $name;
		public  $password;

		public function Admin($ida, $name, $password){
			$this->ida = $ida;
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
	    	return password_hash($password, PASSWORD_DEFAULT);
	    }

	    public static function addAdmin($name, $password){
	    	$bd = bd::getInstance();
		    $req = $bd->prepare("INSERT INTO 'ADMIN'('IDA','NAMEA','PASSWORDA') VALUES (NULL,?,?)");
		    $res->execute([$name, $password]);
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
