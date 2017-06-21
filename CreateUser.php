<?php
class Db {
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
		$this->username = htmlspecialchars ( $_POST ['username'] );
	}
	function getUser() {
		return $this->username;
	}
	function setPassword() {
		$this->password = htmlspecialchars ( $_POST ['password'] );
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
		try {
			$conn = new PDO ( "mysql:host=$this->servername;dbname=$this->dbname", $this->dbuser, $this->dbpass );
			// set the PDO error mode to exception
			$conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$stmt = "SELECT * FROM ojtexercise.user";
			foreach ( $conn->query ( $stmt ) as $count ) {
				
				if ($this->username == $count ['username'] && sha1 ( $this->password ) == $count ['password']) {
					header ( 'Location: rf_viewusers.php' );
					exit ();
				} else {
					echo "<script>
					 alert('Invalid Username or Password!');
					 window.location.href='rf_login.php';
					 </script>";
				}
			}
		} catch ( PDOException $e ) {
			echo "Connection failed: " . $e->getMessage ();
		}
		$conn = null;
	}
	function addUser() {
		try {
			$conn = new PDO ( "mysql:host=$this->servername;dbname=$this->dbname", $this->dbuser, $this->dbpass );
			// set the PDO error mode to exception
			$shaEncrypt = sha1 ( $this->password );
			$conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$sql = "INSERT INTO user (username, password, email, firstname, lastname, birthdate, gender)
				VALUES ('$this->username', '$shaEncrypt', '$this->email', '$this->firstname', '$this->lastname', '$this->birthdate', '$this->gender')";
			// use exec() because no results are returned
			$conn->exec ( $sql );
			
			echo "<script>
	alert('Success!');
	window.location.href='rf_viewusers.php';
	</script>";
		} catch ( PDOException $e ) {
			echo $sql . "<br>" . $e->getMessage ();
		}
		
		$conn = null;
	}
	function deleteUser() {
		try {
			$conn = new PDO ( "mysql:host=$this->servername;dbname=$this->dbname", $this->dbuser, $this->dbpass );
			// set the PDO error mode to exception
			$conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			
			if (isset ( $_POST ['checkbox'] )) {
				
				$deleteMe = $_POST ['checkbox'];
				
				if ($deleteMe != 0) {
					
					$ids = array ();
					
					foreach ( $_POST ['checkbox'] as $pval ) {
						
						$ids [] = ( int ) $pval;
					}
					
					$ids = implode ( ',', $ids );
					$query = $conn->prepare ( "DELETE FROM ojtexercise.user WHERE `id` IN ($ids)" );
					$query->execute ();
					
					echo "<script>
			  alert('Deleted!');
			  window.location.href='rf_viewusers.php';
			 </script>";
				}
			} else {
				
				echo "<script>
			  alert('Please select one or more rows to delete!');
			  window.location.href='rf_viewusers.php';
			 </script>";
			}
		} catch ( PDOException $e ) {
			echo "<br>" . $e->getMessage ();
		}
		
		$conn = null;
	}
	function updateUser() {
		$conn = new PDO ( "mysql:host=$this->servername;dbname=$this->dbname", $this->dbuser, $this->dbpass );
		// set the PDO error mode to exception
		$conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		
		if (isset ( $_POST ['checkbox'] )) {
			
			$deleteMe = $_POST ['checkbox'];
			
			if (count ( $deleteMe ) == 1) {
				
				for($i = 0; $i < count ( $deleteMe ); $i ++) {
					
					$sql = "SELECT * FROM ojtexercise.user WHERE id = " . $deleteMe [$i];
					$conn->exec ( $sql );
					session_start ();
					$_SESSION ['select'] = $sql;
					$_SESSION ['noOfSelected'] = $deleteMe;
					header ( 'Location: rf_update.php' );
					exit ();
				}
			} else {
				echo "<script>
			  alert('Please check only one data!');
			  window.location.href='rf_viewusers.php';
			 </script>";
			}
		} else {
			echo "<script>
			  alert('Please check only one data!');
			  window.location.href='rf_viewusers.php';
			 </script>";
		}
	}
	function updateSelected() {
		$conn = new PDO ( "mysql:host=$this->servername;dbname=$this->dbname", $this->dbuser, $this->dbpass );
		// set the PDO error mode to exception
		$conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		session_start ();
		$noOfSelectedInfo = $_SESSION ['noOfSelected'];
		// $sessionSelect = $_SESSION ['select'];
		
		$ids = array ();
		
		foreach ( $noOfSelectedInfo as $pval ) {
			
			$ids [] = ( int ) $pval;
		}
		
		$ids = implode ( ',', $ids );
		
		if (is_array ( $noOfSelectedInfo )) {
			
			for($i = 0; $i <= count ( $noOfSelectedInfo ); $i ++) {
				$shaEncrypt = sha1 ( $this->password );
				$sql = $conn->prepare ( "UPDATE ojtexercise.user SET username='" . $this->username . "', password='" . $shaEncrypt . "', email='" . $this->email . "', firstname='" . $this->firstname . "', lastname='" . $this->lastname . "', birthdate='" . $this->birthdate . "', gender='" . $this->gender . "' WHERE `id` IN ($ids)" );
				$sql->execute ();
			}
			echo "<script>alert('Updated!');
window.location.href='rf_viewusers.php';
</script>";
		} else {
			echo "<script>alert('Error, try again!');
window.location.href='rf_update.php';
</script>";
		}
		
		$conn = null;
	}
	function addMore() {
		header ( 'Location: rf_register.php' );
		exit ();
	}
	function __destruct() {
	}
}

$objDatabase = new Db ();

if (isset ( $_POST ['submit'] )) {
	
	$objDatabase->setUser ();
	$objDatabase->setPassword ();
	$objDatabase->setEmail ();
	$objDatabase->setFirstName ();
	$objDatabase->setLastName ();
	$objDatabase->setBdate ();
	$objDatabase->setGender ();
	$objDatabase->addUser ();
} else if (isset ( $_POST ['login'] )) {
	
	$objDatabase->setUser ();
	$objDatabase->setPassword ();
	$objDatabase->connectDB ();
} else if (isset ( $_POST ['delete'] )) {
	
	$objDatabase->deleteUser ();
} else if (isset ( $_POST ['update'] )) {
	
	$objDatabase->updateUser ();
} else if (isset ( $_POST ['submit1'] )) {
	$objDatabase->setUser ();
	$objDatabase->setPassword ();
	$objDatabase->setEmail ();
	$objDatabase->setFirstName ();
	$objDatabase->setLastName ();
	$objDatabase->setBdate ();
	$objDatabase->setGender ();
	$objDatabase->updateSelected ();
} else if (isset ( $_POST ['addMore'] )) {
	$objDatabase->addMore ();
} else if (isset ( $_POST ['logout'] )) {
	header ( 'Location: rf_login.php' );
	exit ();
}

?>