<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'unregister'); 
$lecturerID=$_SESSION['lecturerID'];
$code=$_GET['code'];
$name=$_GET['name'];
$results = mysqli_query($db, "SELECT * FROM lectureNotes WHERE subjectCode='".$code."'");
$results2 = mysqli_query($db, "SELECT * FROM subject WHERE subjectCode='".$code."'");
$results3 = mysqli_query($db, "SELECT * FROM assignment WHERE subjectCode='".$code."'");
while ($row10 = mysqli_fetch_array($results2)) { 
$status=$row10['status'];
}
if(mysqli_num_rows($results)===0){
  $nonotes="No Lecture Notes";
}
if(mysqli_num_rows($results3)===0){
  $empty="No Assignment Submissions";
}


//lecturer
  // initialize variables
  
	$notes = "";
	$notesID = 0;
	if (isset($_POST['save4'])) {
    $notes = $_POST['notes'];
		mysqli_query($db, "INSERT INTO lectureNotes ( notes,subjectCode) VALUES ('$notes','$code')"); 
		header('location: lecturerNotes.php?code='.$code.'&name='.$name);
	}
	

if (isset($_GET['del4'])) {
	$notesID = $_GET['del4'];
  mysqli_query($db, "DELETE FROM lectureNotes WHERE notesID=$notesID");
  header('location: lecturerNotes.php?code='.$code.'&name='.$name);
}

if (isset($_POST['update'])) {
  $status = $_POST['status'];
  $start = $_POST['start'];
  $end = $_POST['end'];

  mysqli_query($db, "UPDATE subject SET  status='$status',start='$start',end='$end'  WHERE subjectCode='".$code."'");
  header('location: lecturerNotes.php?code='.$code.'&name='.$name);
}
	

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
  .form-style-5{
	max-width: 500px;
	padding: 10px 20px;
	background: #f4f7f8;
	margin: 30px 0;
	padding: 20px;
	background: #f4f7f8;
	border-radius: 8px;
	font-family: Georgia, "Times New Roman", Times, serif;
}
button {
    background-color: #FFAFA2;
    color: white;
    padding: 7px;
    width: 100%;
}
select {
    padding: 5px 20px;
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
   <a href="lecturerIndex.php">Home</a> 
  <a href="booking.php">Consultation Booking</a>
  
</div>
</nav>

<main>
<div class="container">
<h3 style="text-align:center;margin-top:50px;"><?php echo $code; ?> <?php echo $name; ?></h3>
<div class="row">
<h4>Lecture Notes</h4>
  <?php if(isset($nonotes)) {
   echo $nonotes; 
    
  } else {?>
	<table>
		<thead>
			<tr>
				<th>Lecture Notes</th>
				<th>Action</th>

			</tr>
		</thead>

		<?php while ($row = mysqli_fetch_array($results)) { ?>
		
			<tr>
				<td><a href="<?php echo $row['notes']; ?>" download data-aos="zoom-in" data-aos-anchor="data-aos-anchor"><?php echo $row['notes']; ?></a>  </td>
				<td>
					<a href="lecturerNotes.php?del4=<?php echo $row['notesID']; ?>&code=<?php echo $code;?>&name=<?php echo $name ?>">Delete</a>
				</td>
			</tr>
		<?php } ?>
	</table>
  <?php } ?>
  <div class="form-style-5">
  <form  method="post" action="#" >
	<input type="hidden" name="notesID" value="<?php echo $notesID; ?>">
		<div class="input-group">
			<label>Upload Lecture Notes</label>
			<input type="file" name="notes">
			
		</div>
		<div class="input-group">
			
				<button class="btn" type="submit" name="save4" >Save</button>
			
		</div>
		 
	</form>
  </div>
  <h4>Assignment Submitted by Students</h4>
<?php if(isset($empty)){
 echo $empty; 
} else {
 ?>

<table>

<tr>
<th>Assignemnt Submitted</th>
<th>Student ID</th>
<th>Grade</th>
<th>Feedback</th>
<th>Mark Assignment</th>
</tr>
<?php while ($row = mysqli_fetch_array($results3)) { ?>
<tr>
<td><a href="<?php echo $row['files']; ?>" download data-aos="zoom-in" data-aos-anchor="data-aos-anchor"><?php echo $row['files']; ?></a></td>
<td><?php echo $row['studentID']; ?></td>
<td><?php echo $row['grade']; ?></td>
<td><?php echo $row['feedback']; ?></td>
<td><a href="LectureGrade.php?files=<?php echo $row['files']; ?>&studentID=<?php echo $row['studentID']; ?>">Mark Now</a></td>
<?php } ?>
</tr>
</table>
<?php } ?>
<h4>Assignment Status</h4>

<div class="form-style-5" style="margin-top:0;">
  <form  method="post" action="#" >
		<div class="input-group">
    <label>Assignment Status (manual open and close of assignment submission)</label><br>
			<select  name="status" >
			
				<option value="Yes"  <?php if($status==="Yes") echo 'selected="selected"';?>>Yes</option>
				<option value="No"  <?php if($status==="No") echo 'selected="selected"';?>>No</option>
			</select>
			
		</div>
    <br>
    <label>OR</label>
    <br><br>
    <label>Start Date and Time</label>
    <input type="datetime-local" name="start">
    <label>End Date and Time</label>
    <input type="datetime-local" name="end">
		<div class="input-group" style="margin-top:20px;">
			
				<button class="btn" type="submit" name="update" >Save</button>
			
		</div>
		 
	</form>
  </div>
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

 
   
