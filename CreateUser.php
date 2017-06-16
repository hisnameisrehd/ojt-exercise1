<?php
class Database {
	
	var $servername;
	var $dbuser;
	var $dbpass;
	var $dbname;
	private $username;
	private $password;
	private $email;
	private $firstname;
	private $lastname;
	private $birthdate;
	private $gender;
	
	
	function __construct() {
		$this->servername = "localhost";
		$this->dbuser = "root";
		$this->dbpass = "";
		$this->dbname = "ojtexercise";
	}
	function setUser() {
		$this->userName = htmlspecialchars ( $_POST ['username'] );
	}
	function getUser() {
		return $this->userName;
	}
	function setPassword() {
		$this->passWord = htmlspecialchars ( $_POST ['password'] );
	}
	function getPassword() {
		return $this->password;
	}
	function setEmail() {
		$this->email = htmlspecialchars ( $_POST ['email'] );
	}
	function getEmail() {
		return $this->email;
	}
	function setFirstName() {
		$this->firstname = htmlspecialchars ( $_POST ['firstname'] );
	}
	function getFirstName() {
		return $this->firstname;
	}
	function setLastName() {
		$this->lastname = htmlspecialchars ( $_POST ['lastname'] );
	}
	function getLastName() {
		return $this->lastname;
	}
	function setBdate() {
		$this->birthdate = htmlspecialchars ( $_POST ['birthdate'] );
	}
	function getBdate() {
		return $this->birthdate;
	}
	function setGender() {
		$this->gender = htmlspecialchars ( $_POST ['gender'] );
	}
	function getGender() {
		return $this->gender;
	}
	function connectDB() {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname;
		
		try {
			$conn = new PDO ( "mysql:host=$servername;dbname = $this->dbname;", $username, $password );
			// set the PDO error mode to exception
			$conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			echo "Connected successfully";
		} catch ( PDOException $e ) {
			echo "Connection failed: " . $e->getMessage ();
		}
	}
	function addUser() {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "ojtexercise";
		
		try {
			$conn = new PDO ( "mysql:host=$this->servername;dbname=$this->dbname", $this->dbuser, $this->dbpass );
			// set the PDO error mode to exception
			$conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$sql = "INSERT INTO user (username, password, email, firstname, lastname, birthdate, gender)
    VALUES ('$this->username', '$this->password', '$this->email', '$this->firstname', '$this->lastname', '$this->birthdate', '$this->gender')";
			// use exec() because no results are returned
			$conn->exec ( $sql );
			echo "New record created successfully";
		} catch ( PDOException $e ) {
			echo $sql . "<br>" . $e->getMessage ();
		}
		
		$conn = null;
	}
	function __destruct() {
	}
}

$objDatabase = new Database ();
$objDatabase->setUser();
$objDatabase->setPassword();
$objDatabase->setEmail();
$objDatabase->setFirstName();
$objDatabase->setLastName();
$objDatabase->setBdate();
$objDatabase->setGender();

if (isset ( $_POST ['submit'] )) {
	
	$objDatabase->addUser ();
	
	echo "<script>

	alert('Success!');	
	window.location.href='rf_login.php';
	</script>";
}

?>