<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unregister";
$con = new mysqli($servername, $username, $password, $dbname);
if(isset($_POST['submit']))
{

 $id=$_POST['id'];
 $password=$_POST['password'];


 
   $sql = "select * from systemAdmin WHERE id='$id' and password='$password'";
   $result = mysqli_query($con, $sql);
   
   if (mysqli_num_rows($result) > 0)
   {

	header("Location: systemAdmin_index.php");
   }
   else
   {
   $error= "You entered ID or password is incorrect";
   }
}

?>
<html lang="en">
<head>
<title>computer science department,unn</title>
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
    <form class="login-form" action="#" method="POST">
      <input type="text" name= "id" placeholder="ID" required="" />
      <input type="password" name="password" placeholder="Password" required = "" />
      <?php if (isset($error)): ?>
	  			<span style="color:red; font-weight:bold;text-align:left;"><?php echo $error; ?><?php unset($error);?></span><br><br>
	   			<?php endif ?>
      <button type="submit" name= "submit">SIGN IN</button>
	  <p class="message">Login as Student? <a href="loginPage.php">Student Login</a></p>
    </form>
  </div>
</div>
</body>




</html>