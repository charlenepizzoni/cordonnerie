<?php
	require_once('bd.php');
	class categorie{
		public  $idcat;
		public  $name;
		public  $libelle;

		public function __construct($idcat, $name, $libelle){
			$this->idcat = $idcat;
			$this->name = $name;
			$this->libelle = $libelle;
		}

			
	    public function getByName($name) {
		    $bd = bd::getInstance();
		    $req = $bd->prepare("SELECT * FROM CATEGORY where NAMECAT=?;");
		    $req->execute([$name]);
			$res = $req->fetch();
			$admin = new Admin($res['IDCAT'], $res['NAMECAT'], $res['LIBELCAT']);
	      	return $admin;
	    }

	    public static function addAdmin($name, $password){
	    	$bd = bd::getInstance();
		    $name = mysql_real_escape_string($name);
		    $req = $bd->query("INSERT INTO 'ADMIN'('IDA','NAMEA','PASSWORDA') VALUES (NULL,".$name.",".encoderPassword($password).")");
	    }

	    public static function verifierAdmin($username, $password){
	    	$admin = getByName($username);
	    	return ($admin->verifierPassword($password));
	    }
	}

?>

<!-- 
	_____________ example of getter __________________________
	    public static function getByName($name) {
		    $list = [];
		    $db = Db::getInstance();
		    $name = mysql_real_escape_string($name);
		    $req = $db->query("SELECT * FROM ADMIN where NAMEA=".$name);

			foreach($req->fetchAll() as $admin) {
		    	$list[] = new Admin($admin['IDA'], $admin['NAMEA'], $post['PASSWORDA']);
		    }

	      	return $list;



			foreach($req->fetchAll() as $admin) {
				echo "1";
		    	$res = new Admin($admin['IDA'], $admin['NAMEA'], $admin['PASSWORDA']);
		    } // it should have ONLY 1 admin object
	    } -->
