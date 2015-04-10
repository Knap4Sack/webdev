
<?php
class Dao {

	private $engine;
	private $host = 'localhost';
	private $db;
	private $user = 'Killshot47';
	private $pass = 'Akshot47!';

	public function __construct ($db){
		$this->db = $db;
	}


	public function getConnection () {
	    return
	      new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
	          $this->pass);
  	}

  	public function insertUser ($email, $password, $mAddress, $m2Address = "", $zCodeMA) {
	    $conn = $this->getConnection();
	    $saveQuery =
	        "INSERT INTO user
	        (email, password, address, address2, zipMailing)
	        VALUES
	        (:email, :password, :mAddress, :m2Address, :zCodeMA)";
	    $q = $conn->prepare($saveQuery);
	    $q->bindParam(":email", $email);
		$q->bindParam(":password", $password);
		$q->bindParam(":mAddress", $mAddress);
		$q->bindParam(":m2Address", $m2Address);
		$q->bindParam(":zCodeMA", $zCodeMA);
	    $q->execute();
    }

  	public function login ($email, $password) {
	  	$conn = $this->getConnection();
	    $saveQuery =
	        "SELECT email, password
	         FROM user
	         WHERE email = :email
	         AND password = :password";
	    $q = $conn->prepare($saveQuery);     
	    $q->bindParam(":email", $email);
		$q->bindParam(":password", $password);
	    $q->execute();
	    return
	    $q->fetch(PDO::FETCH_ASSOC);
  	}

  	public function existingUserCheck ($email){
  		$conn = $this->getConnection();
	    $saveQuery =
	        "SELECT email, password
	         FROM user
	         WHERE email = :email";
	    $q = $conn->prepare($saveQuery);     
	    $q->bindParam(":email", $email);
	    $q->execute();
	    return
	    $q->fetch(PDO::FETCH_ASSOC);
  	}

  	public function uniqueItemCount (){
  		  		$conn = $this->getConnection();
	    $saveQuery =
	        "SELECT *, COUNT(*)
	         FROM user
	         WHERE email = :email";
	    $q = $conn->prepare($saveQuery);     
	    $q->bindParam(":email", $email);
	    $q->execute();
	    return
	    $q->fetch(PDO::FETCH_ASSOC);
  	}

  // public function getComments () {
  //   $conn = $this->getConnection();
  //   return $conn->query("SELECT * FROM comment");
  // }

}