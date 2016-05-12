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

			
	    public static function all() {
		    $list = [];
		    $db = Db::getInstance();
		    $req = $db->query('SELECT * FROM posts');

		    // we create a list of Post objects from the database results
		    foreach($req->fetchAll() as $post) {
		    	$list[] = new Post($post['id'], $post['author'], $post['content']);
		    }

	      return $list;
	    }


	}

?>