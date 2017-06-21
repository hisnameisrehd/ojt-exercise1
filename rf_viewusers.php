<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
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

#userName, #passWord, #email, #firstname, #lastname, #birthday {
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

#submit {
	padding: 10px 22px;
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
	height: 750px;
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

#logout {
	margin-top: -50px;
	margin-right: 100px;
	float: right;
}
</style>


<body>


	<form action="CreateUser.php" method="POST">
	
	<button name = "logout" id = "logout" class = "btn btn-danger">Logout</button>


		<div class="backgroundColorTransparent marginTop container well">
			<table>
				<tr>
					<th></th>
					<th>Username</th>
					<th>Password</th>
					<th>Email</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Birthdate</th>
					<th>Gender</th>
				</tr>
				
				<?php
				$username = "root";
				$password = "";
				$servername = "localhost";
				
				$conn = new PDO ("mysql:host=$servername;dbname=ojtexercise", $username, $password );
				// set the PDO error mode to exception
				$conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				$stmt = $conn->prepare ( "SELECT * FROM ojtexercise.user" );
				$stmt->execute ();
				
				if ($stmt != null) {
					
					foreach ( $stmt as $row ) {
						?>
						<tr>
					<td><input type='checkbox' name='checkbox[]' id='checkbox'
						value="<?php echo $row['id']?>"></td>
						<?php
						echo "<td>" . $row ['username'] . "</td>";
						echo "<td>" . $row ['password'] . "</td>";
						echo "<td>" . $row ['email'] . "</td>";
						echo "<td>" . $row ['firstname'] . "</td>";
						echo "<td>" . $row ['lastname'] . "</td>";
						echo "<td>" . $row ['birthdate'] . "</td>";
						echo "<td>" . $row ['gender'] . "</td></tr>";
					}
				}
				
				?>

			
			
			</table>
		</div>


		<div class = "buttonDiv">
			<button class="btn btn-primary" name="addMore" id="addMore">Add More</button>
			&nbsp;&nbsp;&nbsp;
			<button class="btn btn-primary" name="update" id="update">Update</button>
			&nbsp;&nbsp;&nbsp;
			<button class="btn btn-danger" name="delete" id="delete">Delete</button>
			&nbsp;&nbsp;&nbsp;
		</div>

	</form>





</body>
</html>