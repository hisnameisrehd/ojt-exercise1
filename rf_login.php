<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Welcome mo to</title>
<!--Welcome din-->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Merriweather"
	rel="stylesheet">
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

#userName, #passWord {
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
	margin-right: 55px;
	padding: 10px 22px;
}

#jumboHeader {
	font-family: Merriweather;
	font-size: 70px;
}

a:hover {
	background-color: #7ad0ff;
}
</style>

<body>

	<!--  <nav class="backgroundColorNavBar navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"></a>
			</div>
		</div>
	</nav>
	-->

	<form action="" method="POST">

		<div class="backgroundColorTransparent marginTop container well">
			<div class="row">

				<div class="col-lg-6">
					<img class="img-rounded img-responsive thumbnail"
						src="korosensei.png" width="900" height="1100" />
				</div>
				<div class="col-lg-6" id="textFieldDivider">

					<div class="jumbotron" id="jumboHeader">Log Me in!</div>

					<p>
						<input type="text" required name="user" id="userName"
							placeholder="Enter your username" />
					</p>
					<p>
						<input type="password" required name="pass" id="passWord"
							placeholder="Enter your password" />
					</p>

					<a href="rf_register.php"><u><center>Not yet a member? Register!</center></u></a>
					<br />
					<p align="right">
						<button class="btn btn-primary" name="submit" id="submit">Log-In</button>
					</p>
					<!-- <p><button name = "close" id = "close" onclick="self.close()">Cancel</button> -->
				</div>
			</div>

		</div>

	</form>


</body>
</html>