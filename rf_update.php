<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>View mo to</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Merriweather"
	rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<!-- jQuery library -->
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>

<style>
body {
	/*
		background-image: url("technology.jpg");
		background-repeat: no-repeat;
		background-size: 1400px 680px;
		*/
	background-color: #efefef;
}

.marginTop {
	margin-top: 65px;
}

#userName, #passWord, #email, #firstname, #lastname, #birthdate {
	width: 90%;
	padding: 12px 20px;
	margin: 8px 0;
	display: inline-block;
	border: 2px solid #6d6d6d;
	border-radius: 4px;
	box-sizing: border-box;
}

#textFieldDivider {
	margin-top: 100px;
}

#clickToRegister {
	text-align: center;
}

.backgroundColorTransparent {
	background-color: rgba(0, 0, 0, 0.7);
	border: 2px solid #6d6d6d;
}

.backgroundColorNavBar {
	background-color: #7c1515;
}

.jumbotron {
	margin-top: -100px;
	height: 200px;
	width: 500px;
	background-color: #efefef;
}

#submit1 {
	padding: 10px 22px;
}

#cancel {
	padding: 9px 25px;
}

#reset {
	padding: 10px 30px;
}

#jumboHeader {
	font-family: Merriweather;
	font-size: 60px;
}

a:hover {
	background-color: #7ad0ff;
}

.karmaAkabaneSize {
	width: 900px;
	height: 800px;
}

#firstname, #lastname {
	width: 245px;
}

#radioBox {
	text-align: center;
	font-size: 20px;
	font-family: merriweather;
	color: #efefef;
}

#buttons {
	text-align: right;
	margin-right: 55px;
}

table {
	border-collapse: collapse;
	width: 100%;
}

th, td {
	text-align: left;
	padding: 8px;
}

tr:nth-child(even) {
	background-color: #efefef;
	color: black;
}

tr:nth-child(odd) {
	color: white;
}

.buttonDiv {
	text-align: center;
}
</style>


<body>


	<form action="CreateUser.php" method="POST">
	<?php
	$username = "root";
	$password = "";
	$servername = "localhost";
	
	$conn = new PDO ( "mysql:host=$servername;dbname=ojtexercise", $username, $password );
	// set the PDO error mode to exception
	$conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	
	session_start ();
	$sql = $_SESSION ['select'];
	
	?>


		<div class="backgroundColorTransparent marginTop container well">
			<div class="row">

				<div class="col-lg-6">
					<img class="karmaAkabaneSize img-rounded img-responsive thumbnail"
						src="karmaakabane.jpg" width="900" height="1400" />
				</div>
				<div class="col-lg-6" id="textFieldDivider">

					<div class="jumbotron" id="jumboHeader">Update ME!</div>

<?php

foreach ( $conn->query ( $sql ) as $row ) {
	?>

					<p>
						<input type="text" required name="username" id="username"
							minlength="3" maxlength="12"
							value="<?php echo $row['username']?>" />
					</p>
					<p>
						<input type="password" required name="password" id="password"
							placeholder="Your new password" />
					</p>
					<p>
						<input type="email" required name="email" id="email"
							value="<?php echo $row['email']?>" />
					</p>

					<p>
						<input type="text" required name="firstname" id="firstname"
							value="<?php echo $row['firstname']?>" /> <input type="text"
							required name="lastname" id="lastname"
							value="<?php echo $row['lastname']?>" />
					</p>
					<p>
						<input type="date" required name="birthdate" id="birthdate"
							value="<?php echo $row['birthdate']?>" />
					</p>

					<p id="radioBox">
					
					<?php
	
	if ($row ['gender'] == "Male") {
		?>
						
						<input class="w3-radio" type="radio" name="gender" id="gender"
							value="Male" checked />Male &nbsp; &nbsp; &nbsp; &nbsp; <input
							class="w3-radio" type="radio" name="gender" id="gender"
							value="Female" />Female
						
					<?php
	} else {
		?>
						
						<input class="w3-radio" type="radio" name="gender" id="gender"
							value="Male" />Male &nbsp; &nbsp; &nbsp; &nbsp; <input
							class="w3-radio" type="radio" name="gender" id="gender"
							value="Female" checked />Female
						
					<?php
	}
	
	?>
					
				<?php } ?>
				
				
				
				
				
					 
				</p><br/>
					<p id="buttons">
						<input class="btn btn-primary" type="submit" name="submit1"
							id="submit1" />
					</p>
	
	</form>
	<form action="rf_viewusers.php">

		<p id="buttons">
			<button class="btn btn-danger" name="cancel" id="cancel">Cancel</button>
		</p>

		</div>
		</div>

		</div>



	</form>




</body>
</html>