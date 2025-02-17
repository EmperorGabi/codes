<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'unregister'); 
$lecturerID=$_SESSION['lecturerID'];
$results = mysqli_query($db, "SELECT * FROM booking WHERE lecturerID='".$lecturerID."'");
if(mysqli_num_rows($results)===0){
  $empty="No consultation booking is placed";
}
$bookingID="";
$response="";
if(isset($_GET['bookingID'])){
  $bookingID=$_GET['bookingID'];
  $results3 = mysqli_query($db, "SELECT * FROM booking WHERE bookingID='".$bookingID."'");
  while($row=mysqli_fetch_array($results3)){
    $response=$row['response'];
  }
}
$results2 = mysqli_query($db, "SELECT * FROM booking WHERE lecturerID='".$lecturerID."'");
if(isset($_POST['submit'])){
  $bookingID=$_POST['bookings'];
  $response=$_POST['response'];
  mysqli_query($db, "UPDATE booking SET response='$response'  WHERE bookingID='".$bookingID."'");
  header('location: booking.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Booking</title>
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
	margin: 30px auto;
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
    display:flex;
    justify-content:left;
}
label{
  display:flex;
    justify-content:left;
}

  </style>
	</head>
<body>
<header>
<div>  
<figure><img src="pics/Help-University-Logo.PNG" alt="Logo" width="200" height="150"></figure>
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
  <a class="active" href="booking.php">Consultation Booking</a>
  
</div>
</nav>
<main>
<div class="container" style="text-align:center;">
<h2>Consultations Booked by Students</h2>
<?php if(isset($empty)){
  echo $empty;
}else{ ?>


  

<table class="flat-table">

<tr>
<th>Booking ID</th>
<th>Student ID</th>
<th>Date</th>
<th>Time</th>
<th>Message</th>
<th>Response</th>
<th></th>
</tr>
<?php while ($row= mysqli_fetch_array($results)) { ?>
<tr>
<td><?php echo $row['bookingID']?></td>
<td><?php echo $row['studentID']?></td>
<td><?php echo $row['date']?></td>
<td><?php echo $row['time']?></td>
<td><?php echo $row['message']?></td>
<td><?php echo $row['response']?></td>
<td><a href="booking.php?bookingID=<?php echo $row['bookingID']; ?>">Respond Now</a></td>
</tr>
<?php } ?>
</table>

<form method="POST" action="" class="form-style-5">
  <label>Consultation </label>
  <select name="bookings">
<?php while ($row=mysqli_fetch_array($results2)){ ?>
<option value="<?php echo $row['bookingID'] ?>" <?php if($bookingID===$row['bookingID']) echo 'selected=selected'; ?> ><?php echo $row['bookingID'] ?></option>

<?php } ?>
  </select><br>
  <label>Response</label>
  <input type="text" name="response" value="<?php echo $response ?>">
  <button type="submit" name="submit">Submit Now</button>
</form>

<?php } ?>
</div>
</main>

      
<footer class=site-footer >
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4 mb-5">
            <h3>About Us</h3>
            <p class="mb-5">IT Department is located at Level UL Of Help University ELM Damansara Campus.</p>
            <ul class="list-unstyled footer-link d-flex footer-social">
              <li><a href="#" class="p-2"><span class="fa fa-twitter"></span></a></li>
              <li><a href="#" class="p-2"><span class="fa fa-facebook"></span></a></li>
              <li><a href="#" class="p-2"><span class="fa fa-linkedin"></span></a></li>
              <li><a href="#" class="p-2"><span class="fa fa-instagram"></span></a></li>
            </ul>

          </div>
          <div class="col-md-5 mb-5">
            <div class="mb-5">
              <h3>IT Department Operating hours</h3>
              <p><strong class="d-block">Monday to Saturday</strong> 8AM - 6PM</p>
			  <p><strong class="d-block">Sunday</strong> Closed</p>
            </div>
            <div>
              <h3>Contact Info</h3>
              <ul class="list-unstyled footer-link">
                <li class="d-block">
                  <span class="d-block">Address:</span>
                  <span class="text-white">15, Jalan Sri Semantan 1, Damansara Heights, 50490 Kuala Lumpur,Wilayah Persekutuan, ELM Business School</span></li>
                <li class="d-block"><span class="d-block">Telephone:</span><span class="text-white">+6 03 20942000</span></li>
                <li class="d-block"><span class="d-block">Email:</span><span class="text-white">HelpUniversity@gmail.com</span></li>
              </ul>
            </div>
          </div>
          <div class="col-md-3 mb-5">
            <h3>Quick Links</h3>
            <ul class="list-unstyled footer-link">
              <li><a href="lecturerIndex.php">Home</a></li>
              <li><a href="https://www.turnitin.com/login_page.asp">Turnitin</a></li>
			  <li><a href = "mailto:HelpUniversity@gmail.com">Send Feedback</a></li>
            </ul>
          </div>
          <div class="col-md-3">
          
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-md-center text-left">
            <p>
       Copyright &copy;2020 ® HELP University - All rights reserved
     </p>
          </div>
        </div>
      </div>
    </footer>
	
</body>
</html>

 
   
