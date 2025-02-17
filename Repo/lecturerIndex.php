<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'unregister'); 
$lecturerID=$_SESSION['lecturerID'];
$results = mysqli_query($db, "SELECT * FROM lecturerSubject WHERE lecturerID='".$lecturerID."'");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Lecturer - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/index.css" rel="stylesheet" type="text/css">
	<link href="css/lecturerIndexCss.css" rel="stylesheet" type="text/css">
  <style>
.card {
    display:block;
    /* grid-template-columns: auto;
    grid-template-rows: 170px 170px 50px;
    grid-template-areas:
        "image"
        "text"
        "stats";
    border-radius: 18px;
    background: white;
    box-shadow: 5px 5px 15px rgba(0,0,0,0.9);
    font-family: roboto;
    text-align: center; */
}
  </style>
	</head>
<body>
<header>
<div>  
</div>
</header>
<ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $lecturerID; ?><span class="glyphicon glyphicon-user pull-right"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Account Settings <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
            <li class="divider"></li>
            <li><a href="#">Messages <span class="badge pull-right"> 42 </span></a></li>
            <li class="divider"></li>
            <li><a href="logout.php">Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
          </ul>
        </li>
      </ul>
<nav>
<div id="navbar">
   <a class="active" href="lecturerIndex.php">Home</a>  
  <a href="booking.php">Lecturer's Page</a>
  
</div>
</nav>

<main>
<input type="text" name="search" id="search" placeholder="search">
<div class="container" style="text-align:center;margin-top:20px;">
<h2>Project Submited</h2>
<div class="row">
<?php while ($row= mysqli_fetch_array($results)) { ?>
  <?php  $results2 = mysqli_query($db, "SELECT * FROM subject WHERE subjectCode='".$row['subjectCode']."'"); ?>
  <?php while ($row2= mysqli_fetch_array($results2)) { ?>
  <div class="col-sm-4">
<!-- <div class="card">
  <div class="card-image">
  <img src="pics/<?php echo $row2['image'] ?>" style="max-width:300px;width:100%;">
  </div>
  <div class="card-text">
  <h2>Subject Code: <?php echo $row2['subjectCode']; ?></h2>
  <p>Subject Name: <?php echo $row2['subjectName']; ?></p>
  </div>
  <div class="card-stats">
  <div class="stat">
  <a href="lecturerNotes.php?code=<?php echo $row2['subjectCode'];?>&name=<?php echo $row2['subjectName'];?>">Manage Subject</a>
</div> -->
  </div>
 </div>
 </div>

<?php } ?>
<?php } ?>
</div>
<br><br>
<h2 style="margin-top:20px;">Assignments Submissions</h2>
<a href="lecturerAssignment.php">View All</a>
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
              <li><a class="active" href="Consultation.php">Student Page</a></li>
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

 
   
