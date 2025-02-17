<?php
	session_start();
if(isset($_POST['submit']))
{
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "unregister";
 $con = new mysqli($servername, $username, $password, $dbname);
 $name=$_POST['username'];
 $pass=$_POST['password'];


 
   $sql = "select * from users WHERE username='$name'AND password='$pass'";
   $result = mysqli_query($con, $sql);
   
   if (mysqli_num_rows($result) > 0)
   {
    $_SESSION['id']=$name;
	header('location: index.php');
   }
   else
   {
   $error= "The Id or password is incorrect";
   }
}
  
 ?>
<html lang="en">
<head>
<title>University of Nigeria,Nsukka</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="css/loginCss.css" rel="stylesheet" type="text/css">
<script>
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
</head>
<header>
<div class="footer">  
</div>
</header>
<body>
    <div class="login-page">
  <div class="form">
    <form class="login-form" action="loginPage.php" method="POST">
      <input type="text" name= "username" placeholder="Student Id" required="" />
      <input type="password" name="password" placeholder="password" required = "" />
	    <?php if (isset($error)): ?>
	  			<span style="color:red; font-weight:bold;text-align:left;"><?php echo $error; ?><?php unset($error);?></span><br><br>
	   			<?php endif ?>
      <button type="submit" name= "submit">SIGN IN</button>
      <p class="message">Not registered? <a href="RegisterPage.php">Create an account</a></p>
	  <p class="message">Login as Lecturer? <a href="admin_Login.php">Lecturer Login</a></p>
    </form>
  </div>
</div>
</body>




</html>

