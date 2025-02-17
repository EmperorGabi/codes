<?php
  Session_start();
  
  $host="localhost";
  $user="root";
  $password="";
  $db="unregister";
  
  mysqli_connect($host,$user,$password,$db);
  
  $con = mysqli_connect($host,$user,$password,$db); 
  
  if(isset($_POST['submit'])) {
		$name = $_POST['username'];
		$email = $_POST['email'];
		$pass = $_POST['password'];
		
		$reg=" insert into users (username, email, password) values ('$name', '$email', '$pass')";
	
	if(mysqli_query($con, $reg)) {
	
		header('location: loginPage.php');
		echo"Registration Successdul!";
		
	}else{
		echo"Registration Unsuccessful!";
	
	}
  
 
  }
  
   ?>
<html>
<head>
<title>University of Nigeria,Nsukka</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="css/register.css" rel="stylesheet" type="text/css" media="all" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<a id="logoHU"></a>
</head>
<body>
	<div class="main-w3layouts wrapper">
		<h1>Sign up now!</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="RegisterPage.php" method="POST"> 
					<input class="text" type="text" name="username" placeholder="Student Id" required="">
					<input class="text email" type="email" name="email" placeholder="Email" required="">
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<input class="text w3lpass" type="password" name="confirmpassword" placeholder="Confirm Password" required="">
					<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span>
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" name= "submit" value="SIGNUP">
				</form>
				<p>Already an active user? <a href="loginPage.php"> Login Now!</a></p>
			</div>
		</div>
		
		<!-- copyright -->
		<div class="colorlibcopy-agile">
			<p>Copyright &copy;2023 ® University of Nigeria - All rights reserved</a></p>
		</div>
	</div>
	<!-- //main -->
</body>
</html>