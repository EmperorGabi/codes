<?php 
session_start();
$id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
if ($id === null) {
    // Handle the case when 'id' is not set in the session
    // For example, redirect to a login page or show an error message
}
$db = mysqli_connect('localhost', 'root', '', 'unregister'); 
$results = mysqli_query($db, "SELECT * FROM studentSubject WHERE studentID='".$id."'");
if(mysqli_num_rows($results)===0){
  $empty="";
}

?>

<!-- Rest of your HTML code -->


<!DOCTYPE html>
<html lang="en">
<head>
<title>Dashboard</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
	<link href="css/indexCss.css" rel="stylesheet">
  <!-- <link href="css/index.css" rel="stylesheet" type="text/css"> -->
</head>
<body>
<header>
<div>  
</div>
</header>
<ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $id; ?> <span class="glyphicon glyphicon-user pull-right"></span></a>
          <ul class="dropdown-menu">
            <!-- <li><a href="#">Account Settings <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
            <li class="divider"></li>
            <li><a href="#">Messages <span class="badge pull-right"> 42 </span></a></li>
            <li class="divider"></li> -->
            <li><a href="logout.php">Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
          </ul>
        </li>
      </ul>
<nav style="margin-bottom:10rem;">
<div id="navbar" style="">
  <a class="active" href="index.php">Home</a> 
  <a href="Detail.php">Lecturer And Staff</a>
  <a href="Consultation.php">Student page</a> 
</div>
</nav>


<div class="container1">
  <h1 class="center">WELCOME TO COMPUTER SCIENCE DEPARTMENT,UNN</h1> <br>
  <h4 class="center">UNDERGRADUATE PROJECT REPOSITORY</h4>
  <br/>
  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height:100%;position:relative;">
    <!-- Indicators -->

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
		<h1 class="center">Lorem ipsum dolor sit, amet consectetur adipisicing elit.!</h1>      </div>

      <div class="item">
         <h1 class="center">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</h1>
      </div>
    
      <div class="item">
         <h1 class="center">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h1>
      </div>
    </div>


    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>

    <ol class="carousel-indicators" style="position:absolute;top:8rem;">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
  </div>

  
  
</div>


<section class="container">
<br/> 
<h2 class="center"> IMPORTANT REMINDER! </h2>
<br/>
<div class="row">
    <div class="col-md-3">
		<p>Please include Assignment Coversheet in all your assignment before submitting it! </p> 
	</div>
	<div class="col-md-3">
		<p>Consult your respective lecturers if you are having trouble doing your assignment </p>
	</div>
	<div class="col-md-3">
		<p>Include your turnitin report only if stated by lecturers </p>
	</div>
	<div class="col-md-3">
		<p>Assignment submission deadline is 2PM! Any submission after will be considered late with a penalty of 5 MARKS deduction!</p>
		</div>
		</div>
	</section>
<br/>
<br/>
<main>
<div class="container" style="text-align:center;">
<!-- <h2>Enrolled Subjects</h2> -->
<?php if(isset($empty)){
 echo $empty; 
}
 ?>
 <div class="row">
<?php while ($row= mysqli_fetch_array($results)) { ?>
 
<?php  $results2 = mysqli_query($db, "SELECT * FROM subject WHERE subjectCode='".$row['subjectCode']."'"); ?>
<?php while ($row2= mysqli_fetch_array($results2)) { ?>
  <div class="col-sm-4">
<div class="card">
<div class="card-image">
  <img src="pics/<?php echo $row2['image'];?>" style="max-width:300px;width:100%;">
</div>
<div class="card-text">
<h2>Subject Code: <?php echo $row2['subjectCode'];?></h2>
<p>Subject Name: <?php echo $row2['subjectName'];?></p>
</div>
<div class="card-stats">
  <div class="stat">
  <a href="student_Submission.php?code=<?php echo $row2['subjectCode'];?>&name=<?php echo $row2['subjectName'];?>">View Subject</a>
</div>
</div>
</div>
</div>
<?php } ?>

<?php } ?>

</div>
</div>
</main>

<footer class=site-footer >
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4 mb-5">
            <h3>About Us</h3>
            <p class="mb-5">Computer Science Department is located at Abuja building.</p>
            <ul class="list-unstyled footer-link d-flex footer-social">
              <li><a href="#" class="p-2"><span class="fa fa-twitter"></span></a></li>
              <li><a href="#" class="p-2"><span class="fa fa-facebook"></span></a></li>
              <li><a href="#" class="p-2"><span class="fa fa-linkedin"></span></a></li>
              <li><a href="#" class="p-2"><span class="fa fa-instagram"></span></a></li>
            </ul>

          </div>
          <div class="col-md-5 mb-5">
            <div class="mb-5">
              <h3>Computer Science Department Operating hours</h3>
              <p><strong class="d-block">Monday to Friday</strong> 8AM - 6PM</p>
			  <p><strong class="d-block">Sunday</strong> Closed</p>
            </div>
            <div>
              <h3>Contact Info</h3>
              <ul class="list-unstyled footer-link">
                <li class="d-block">
                  <span class="d-block">Address:</span>
                  <span class="text-white">Department of Computer Science,Abuja building,University of Nigeria,Nsukka</span></li>
                <li class="d-block"><span class="d-block">Telephone:</span><span class="text-white">+6 03 20942000</span></li>
                <li class="d-block"><span class="d-block">Email:</span><span class="text-white">consultancy.unn@unn.edu.ng</span></li>
              </ul>
            </div>
          </div>
          <div class="col-md-3 mb-5">
            <h3>Quick Links</h3>
            <ul class="list-unstyled footer-link">
              <li><a href="index.php">Home</a></li>
              <!-- <li><a href="https://www.turnitin.com/login_page.asp">Turnitin</a></li> -->
              <li><a class="active" href="Consultation.php">Student page</a></li>
			  <li><a href = "mailto:consultancy.unn@unn.edu.ng">Send Feedback</a></li>
            </ul>
          </div>
          <div class="col-md-3">
          
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-md-center text-left">
            <p>
       Copyright &copy;2023 ® University of Nigeria,Nsukka - All rights reserved
     </p>
          </div>
        </div>
      </div>
    </footer>


</body>
</html>

