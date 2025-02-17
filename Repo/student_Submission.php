<?php 
session_start();
$id=$_SESSION['id'];
if(isset($_GET['code'])){
  $code=$_GET['code'];
}
if(isset($_GET['name'])){
  $name=$_GET['name'];
}
$db = mysqli_connect('localhost', 'root', '', 'unregister'); 
$results = mysqli_query($db, "SELECT * FROM lectureNotes WHERE subjectCode='".$code."'");
if(mysqli_num_rows($results)===0){
  $empty="No Lecture Notes";
}

$results5 = mysqli_query($db, "SELECT * FROM subject WHERE subjectCode='".$code."'");
$results6 = mysqli_query($db, "SELECT * FROM assignment WHERE subjectCode='".$code."' AND studentID='".$id."'" );
if(mysqli_num_rows($results6)===0){
  $empty2="No Assignment Submissions";
}
$results7 = mysqli_query($db, "SELECT * FROM assignment WHERE subjectCode='".$code."' AND studentID='".$id."'" );
while ($row= mysqli_fetch_array($results5)) {
$status=$row['status'];
$start=$row['start'];
$end=$row['end'];
}

$files = "";
$assignmentID = 0;
if (isset($_POST['save4'])) {
  $files = $_POST['files'];
  mysqli_query($db, "INSERT INTO assignment ( files,subjectCode,studentID) VALUES ('$files','$code','$id')"); 
  header('location: student_Submission.php?code='.$code.'&name='.$name);
}


if (isset($_GET['del4'])) {
$assignmentID = $_GET['del4'];
$code=$_GET['code'];
$name=$_GET['name'];
mysqli_query($db, "DELETE FROM assignment WHERE assignmentID=$assignmentID");
header('location: student_Submission.php?code='.$code.'&name='.$name);
}
date_default_timezone_set("Asia/Singapore");
$time= date("Y-m-d G:i:s");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Subject Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
    <link href="css/contactCss.css" rel="stylesheet" type="text/css">
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
<nav>
<div id="navbar">
   <a href="index.php">Home</a>  
  <a href="Detail.php">Lecturer And Staff</a>
  <a href="Consultation.php">Book Consultation</a>  
</div>
</nav>

<main>
<div class="container" style="text-align:center;">
<h1><?php echo $code ?></h1>
<h1><?php echo $name ?></h1>
<h2>Lecture Notes</h2>
<?php if(isset($empty)){
 echo $empty; 
}
 ?>

<?php while ($row= mysqli_fetch_array($results)) { ?>
<p><a  href="<?php echo $row['notes']; ?>" download data-aos="zoom-in" data-aos-anchor="data-aos-anchor"><?php echo $row['notes']; ?></a></p>
<?php } ?>


<h2>Assignment Submitted</h2>
<?php if(isset($empty2)){
 echo $empty2; 
}
 ?>
 <?php if(mysqli_num_rows($results6)>0){ ?>
  

<table class="flat-table">
<tr>
<td>Assignemtn File</td>
<td>Grade</td>
<td>Feedback</td>
</tr>
<?php while ($row= mysqli_fetch_array($results6)) { ?>
<tr>

<td><a href="<?php echo $row['files']; ?>" download data-aos="zoom-in" data-aos-anchor="data-aos-anchor"><?php echo $row['files']; ?></a></td>

<td><?php echo $row['grade']; ?></td>
<td><?php echo $row['feedback']; ?></td>

</tr>
<?php } ?>
</table>
<?php } ?>

<br><br>
<?php if ($status==="Yes" or ($time>=$start and $time<=$end) ) { ?>
	<h3 class="middle"> 
	Submit Your File Here! Note: Compressed Your File If More Than 500MB.
	</h3>
	<table>
		<thead>
			<tr>
				<th>Assignment Files</th>
				<th>Action</th>

			</tr>
		</thead>

		<?php while ($row = mysqli_fetch_array($results7)) { ?>
		
			<tr>
				<td><?php echo $row['files']; ?>  </td>
				<td>
					<a href="student_Submission.php?del4=<?php echo $row['assignmentID']; ?>&name=<?php echo $name; ?>&code=<?php echo $code ?>">Delete</a>
				</td>
			</tr>
		<?php } ?>
	</table>

  <form  method="post" action="#" >
	<input type="hidden" name="assignmentID" value="<?php echo $assignmentID; ?>">
		<div class="input-group">
			<label>Assignment Files</label>
			<input type="file" name="files">
			
		</div>
		<div class="input-group">
			
				<button class="btn" type="submit" name="save4" >Upload</button>
			
		</div>
		 
	</form>
            

<?php } else {?>
<p>Assignment submission is not open.</p>
<?php } ?>
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
