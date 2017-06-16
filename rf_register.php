<!doctype>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Create an account</title>

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

#submit{
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
</style>

<body>

<form action = "CreateUser.php" method = "POST">

<div class="backgroundColorTransparent marginTop container well">
		<div class="row">

			<div class="col-lg-6">
				<img class="karmaAkabaneSize img-rounded img-responsive thumbnail"
					src="karmaakabane.jpg" width="900" height="1400" />
			</div>
			<div class="col-lg-6" id="textFieldDivider">

				<div class="jumbotron" id="jumboHeader">Fill me out!</div>

				<p>
					<input type="text" required name="username" id="userName"
						placeholder="Enter your username" />
				</p>
				<p>
					<input type="password" required name="password" id="passWord"
						placeholder="Enter your password" />
				</p>
				<p>
					<input type="email" required name="email" id="email"
						placeholder="Enter a valid email" />
				</p>
				
				<p>
					<input type="text" required name="firstname" id="firstName"
						placeholder="Firstname" /> <input type="text" required
						name="lastname" id="lastname" placeholder="Lastname" />
				</p>
				<p>
					<input type="date" required name="birthdate" id="birthdate"
						placeholder="Birthdate" />
				</p>

				<p id="radioBox">
					<input class="w3-radio" type="radio" name="gender" id="gender"
						value="Male" />Male &nbsp; &nbsp;
					&nbsp; &nbsp; <input class="w3-radio" type="radio" name="gender"
						id="gender" value="Female" />Female
				</p>
				<br /><br />
				<p id = "buttons">
					<input class = "btn btn-danger" type = "reset" name = "reset" id = "reset"/>
					
					
					
						<input class = "btn btn-primary" type = "submit" name = "submit" id = "submit"/>
						
					
					
					
					
					
				</p>
				
				





			</div>
		</div>

	</div>
	

</form>

	
	<?php 
		
		
	
	
	
		
	
	
	?>
	
	
	
	


</body>
</html>