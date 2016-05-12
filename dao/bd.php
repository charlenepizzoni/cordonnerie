<?php
	require(param.php);

	class Db {
	    private static $instance = NULL;

	    private function __construct() {}

	    private function __clone() {}

	    public static function getInstance() {
		      if (!isset(self::$instance)) {
		        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		        self::$instance = new PDO('mysql:host='.$host;'dbname='.$base, $user, $password, $pdo_options);
		      }
		      return self::$instance;
	    }
	}

	try {
		$bdd = new PDO('mysql:host=$host,dbname=$base,$user,$password');
	} 
	catch (Exception $e) {
    	die('Erreur lors de la connexion à la base de donnée.' . $e->getMessage());
	}