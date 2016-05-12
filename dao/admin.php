<? php

	class admin{
		public  $idA;
		public  $name;
		public  $password;

		public function __construct($idA, $name, $password){
			$this->idA = $idA;
			$this->name = $name;
			$this->password = $password;
		}

			
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
	    } -->