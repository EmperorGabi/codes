<?php
if (!isset($_SESSION)) {
  session_start();
}

// session_start();
$db = mysqli_connect('localhost', 'root', '', 'unregister'); 
// $lecturerID=$_SESSION['lecturerID'];
$lecturerID = isset($_SESSION['lecturerID']) ? $_SESSION['lecturerID'] : "";

$results = mysqli_query($db, "SELECT * FROM lecturerSubject WHERE lecturerID='".$lecturerID."'");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Assignemnt Submitted</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link href="css/lecturerIndexCss.css" rel="stylesheet" type="text/css">
	<style>
  .flat-table {
  font-family: sans-serif;
  -webkit-font-smoothing: antialiased;
  font-size: 115%;
  overflow: auto;
  width: auto;
  margin:auto;
  }
  th {
    background-color: #FFAFA2;
    color: white;
    font-weight: normal;
    padding: 20px 30px;
    text-align: center;
  }
  td {
    background-color: rgb(238, 238, 238);
    color: rgb(111, 111, 111);
    padding: 20px 30px;
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
            <!-- <li><a href="#">Account Settings <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
            <li class="divider"></li>
            <li><a href="#">Messages <span class="badge pull-right"> 42 </span></a></li>
            <li class="divider"></li> -->
            <li><a href="logout.php">Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
          </ul>
        </li>
      </ul>
<nav>
<div id="navbar">
   <a href="lecturerIndex.php">Home</a> 
  <a href="booking.php">Consultation Booking</a>
  
</div>
</nav>


<main>
<div class="container" style="text-align:center;">
<h2>Assignment Submitted by Students</h2>
<table class="flat-table">


<tr>
<th>Assignemnt Submitted</th>
<th>Subject Code</th>
<th>Student ID</th>
<th>Grade</th>
<th>Feedback</th>
<th>Mark Assignment</th>
</tr>
<?php while ($row10 = mysqli_fetch_array($results)) { 
  $results3 = mysqli_query($db, "SELECT * FROM assignment WHERE subjectCode='".$row10['subjectCode']."'");
   
 while ($row = mysqli_fetch_array($results3)) { ?>
<tr>
<td><a href="<?php echo $row['files']; ?>" download data-aos="zoom-in" data-aos-anchor="data-aos-anchor"><?php echo $row['files']; ?></a></td>
<td><?php echo $row['subjectCode']; ?></td>
<td><?php echo $row['studentID']; ?></td>
<td><?php echo $row['grade']; ?></td>
<td><?php echo $row['feedback']; ?></td>
<td><a href="LectureGrade.php?files=<?php echo $row['files']; ?>&studentID=<?php echo $row['studentID']; ?>">Mark Now</a></td>
<?php } ?>
<?php } ?>
</tr>
</table>
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
              <li><a class="active" href="Consultation.php">Book Consultation</a></li>
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

 
   
