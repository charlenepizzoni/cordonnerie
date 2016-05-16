<?php
	require_once('bd.php');

	class Token{
		private  $idt;
		private  $ida;
		private  $value;
		private  $end;

		public function __construct($idt, $ida, $value, $end){
			$this->idt = $idt;
			$this->ida = $ida;
			$this->value = $value;
			$this->end = $end;
		}

		public function addToken(){
			$bd = bd::getInstance();
		    $req = $bd->prepare("INSERT INTO TOKEN (IDA, VALUET, ENDT) values (?, ?, ?);");
		    $req->execute([$this->ida, $this->value, $this->end]);
		}

	    public function getByNum($value) {
		    $bd = bd::getInstance();
		    $req = $bd->prepare("SELECT * FROM TOKEN where VALUET=?;");
		    $req->execute([$value]);
			$res = $req->fetch();
			$token = new Token($res['IDT'], $res['IDA'], $res['VALUET'], $res['ENDT']);
	      	return $token;
	    }

	    public static function genererToken($password){
	    	$value = password_hash($password.mt_rand(), PASSWORD_DEFAULT);
	    	while (Token::tokenExist($value)){
	    		$value = password_hash($value.mt_rand(), PASSWORD_DEFAULT);
	    	}
	    	return $value;
	    }

	    public static function tokenExist($token){
	    	$bd = bd::getInstance();
		    $req = $bd->prepare("SELECT count(*) as nb FROM TOKEN where VALUET=?;");
		    $req->execute([$token]);
		    $res = $req->fetch();
		    return ($res['nb']!=0);
	    }

	    public static function pasPerime($token){
	    	$bd = bd::getInstance();
		    $req = $bd->prepare("SELECT * FROM TOKEN where VALUET=?;");
		    $req->execute([$token]);
		    $res = $req->fetch();
		    return ($res['ENDT']>time());
	    }
	}
?>
