<?php
  session_start();
  $id=$_SESSION['id'];
  $db = mysqli_connect('localhost', 'root', '', 'unregister'); 
  $results = mysqli_query($db, "SELECT * FROM lecturer ");
    
  $name="";
  $date="";
  $time="";
  $message="";
	if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $message = $_POST['message'];
    mysqli_query($db, "INSERT INTO booking (studentID,lecturerID,date, time, message,response) VALUES ('$id','$name' ,'$date','$time','$message','No response yet')"); 
    header('location: Consultation.php');
  }

  $results2 = mysqli_query($db, "SELECT * FROM booking WHERE studentID='".$id."' ");
  if(mysqli_num_rows($results2)===0){
    $noBooking="There is no booking placed.";
  }
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Student Page</title>
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
            <li><a href="#">Account Settings <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
            <li class="divider"></li>
            <li><a href="#">Message <span class="badge pull-right"> 42 </span></a></li>
            <li class="divider"></li>
            <li><a href="logout.php">Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
          </ul>
        </li>
      </ul>
<nav>
<div id="navbar">
   <a href="index.php">Home</a> 
  <a href="Detail.php">Lecturer And Staff</a>
  <a class="active" href="Consultation.php">Student page</a> 
</div>
</nav>
<div class="container" style="margin-bottom:8%;border-bottom:1px solid silver; padding-bottom:20px;">
       <?php if(isset($noBooking)){
         echo $noBooking;
       }  else {?>
       
       
        <h2>Project Appproval Response</h2>
        <table>
          <tr>
          <th>Lecturer ID</th>
          <th>Date</th>
          <th>Time</th>
          <th>Message</th>
          <th>Response</th>
          </tr>
          <?php while($row=mysqli_fetch_array($results2)){ ?>
          <tr>
          <td><?php echo $row['lecturerID'] ?></td>
          <td><?php echo $row['date'] ?></td>
          <td><?php echo $row['time'] ?></td>
          <td><?php echo $row['message'] ?></td>
          <td><?php echo $row['response'] ?></td>
          </tr>
          <?php } ?>

        </table>
          <?php } ?>
        
        
        <br><br>
        <h2 >PROJECT SUBMISSION </h2>
        <div class="row">
            <div class="col-sm-6">
           <!--         <form action="" method="POST">
                        <h3>Book Consultation Date</h3>
                        <input type="text" name="name" placeholder="Lecturer Name">
                        <input type="date" name="date" id="date">
                        <input type="text" name="time" placeholder="Time 00:00">
                        <input style="padding-bottom:170px;" type="text" name="message" placeholder="Message">
                        <button class=" btn btn-danger" name="submit" type="submit"><span class="submit" >SUBMIT</span></button>
                    </form> -->

            <form method="POST" action="">
            <label>Lecturer ID</label>
            <select  name="name" required="">
          <?php while ($row10 = mysqli_fetch_array($results)) { ?>
            <option value="<?php echo $row10['lecturerID']; ?>"><?php echo $row10['lecturerID']; ?></option>
            <?php } ?>
          </select>
            <input type="date" name="date" placeholder="Date" required="">
            <input type="time" name="time" placeholder="Time" required="">
            <input type="text" name="message" placeholder="Message" required="">
            <button type="submit" name="submit">Register</button>
            </form>
            </div>
           <div class="row">
                <div class="col-sm-6">
                    <h4>DO YOU WANT TO SUBMIT YOUR PROJECT TO YOUR ASSIGNED SUPERVISOR</h4>
                    <p>Please fill in the form.  </p>
                </div>
        
        
                <div class="col-sm-6">
                    <h4>Submission Date</h4>                    
                </div>
        
		`		
           </div>
                
            
        </div>
    </div>
  

<div class="mapouter">
</head>
<body>

<h1>Lecturer Available Time</h1>

<div class="month">      
  <ul>
    <li class="prev">&#10094;</li>
    <li class="next">&#10095;</li>
    <li>
      April<br>
      <span style="font-size:18px">2020</span>
    </li>
  </ul>
</div>

<ul class="weekdays">
  <li>Mo</li>
  <li>Tu</li>
  <li>We</li>
  <li>Th</li>
  <li>Fr</li>
  <li>Sa</li>
  <li>Su</li>
</ul>

<ul class="days">  
  <li></li>
  <li></li>
  <li>1</li>
  <li>2</li>
  <li>3</li>
  <li>4</li>
  <li>5</li>
  <li>6</li>
  <li>7</li>
  <li><span class="active">8</span></li>
  <li>9</li>
  <li>10</li>
  <li>11</li>
  <li>12</li>
  <li>13</li>
  <li>14</li>
  <li>15</li>
  <li>16</li>
  <li>17</li>
  <li>18</li>
  <li>19</li>
  <li>20</li>
  <li>21</li>
  <li>22</li>
  <li>23</li>
  <li>24</li>
  <li>25</li>
  <li>26</li>
  <li>27</li>
  <li>28</li>
  <li>29</li>
  <li>30</li>
</ul>
       


	
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

 
   
