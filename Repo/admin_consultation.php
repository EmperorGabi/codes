<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Menu - Tea Amoureux</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link href="css/admin_consultation.css" rel="stylesheet" type="text/css">
	</head>
<body>
<header>
<div>  
</div>
</header>
<ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Iasmani Pinazo <span class="glyphicon glyphicon-user pull-right"></span></a>
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
  <a href="LectureGrade.php">Submit Assignment</a> 
  <a class="active" href="admin_consultation.php">Contact</a> 
</div>
</nav>
<div class="container" style="margin-bottom:8%;border-bottom:1px solid silver; padding-bottom:20px;">
        <h2 >Project Repository</h2>
        <div class="row">
            <div class="col-sm-6">
                    <form action="" method="POST">
                            <h3>Project Submission Date</h3>
                            <input type="text" name="student_Id" placeholder="Student Id">
                            <input type="text" name="lecturer_name" placeholder="Lecturer Name">
							<input type="date" name="myDate" id="myDate">
							<input type="text" name="myTime" placeholder="Time 00:00">
                            <input style="padding-bottom:170px;" type="text" name="message" placeholder="Message">
                            <button class=" btn btn-danger" name="submit" type="submit"><span class="submit" >Approve</span></button>
							<button class=" btn btn-danger" name="reject" type="submit"><span class="submit" >Reject</span></button>
                    </form>
            </div>
                
            
        </div>
    </div>
  


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
              <li><a class="active" href="Consultation.php">Project Repoert</a></li>
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

 