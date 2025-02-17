<?php
session_start();
$id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
$db = mysqli_connect('localhost', 'root', '', 'unregister');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Lecturers and Staff Details page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="css/foodCss.css" rel="stylesheet" type="text/css">
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
  <a class="active" href="Detail.php">Lecturer and Staff</a> 
  <a href="Consultation.php">Student Page</a> 
</div>
</nav>
<h3 class="center"> Computer Science Department Lecturer and Staff Details</h3>
      
    <main>
    <div class="container" style="margin-top:2%;">
        <div class="row">
            <div class="col-sm-12">
                <h2 style="border-top:none;">Admin Details</h2>
            </div>
        </div>

		
  
        <div class="row">
                <div class="col-sm-4">
                    <h3>Head of Department and Admin Staff</h3>
                    <p class="description">Prof Bakpo</p>
					<p class="description">Head of Department(Computer Science)</p>
					<p class="description">BSc (Hons) (London) Computer science, Computer science, PhD (Russia)</p>
                </div>
                <div class="col-sm-2">
                    <h3 class="drink"></h3>
                </div>
                <div class="col-sm-4">
                        <h3></h3>
                        <p class="description">Yam Chik Cheong</p>
						   <p class="description">Manager of Information Technology's Department</p>
                    </div>
                    <div class="col-sm-2">
                            <h3 class="drink"></h3>
                    </div>
        </div>
    
            <div class="row">
                    <div class="col-sm-4">
                        <h3>Sandra</h3>
                        <p class="description">Admin Officer (Department of Information Technology)</p>
                    </div>
                    <div class="col-sm-2">
                            <h3 class="drink"></h3>
                    </div>
                    <div class="col-sm-4">
                            <h3>Yeoh Hooi Sim </h3>
                            <p class="description">Admin Officer (Department of Information Technology)</p>
                        </div>
                        <div class="col-sm-2">
                                <h3 class="drink"></h3>
                        </div>
            </div>
     
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Senior Lecturers</h2>
                    </div>
                </div>
 
                <div class="row">
                        <div class="col-sm-4">
                            <h3>Mr.Steven Yong Yik Loong</h3>
                            <p class="description">Master of Software Engineering (Malaya)</p>
							<p class="description">BSc (Hons) Comp Stud (Software Engineering) (Nottingham Trent)</p>
							<p class="description">Senior Lecturer</p>
                        </div>
                        <div class="col-sm-2">
                                <h3 class="drink"></h3>
                        </div>
                        <div class="col-sm-4">
                                <h3>Mr.Kok Chye Hock</h3>
                                <p class="description">BSc (Hons) Maths and Computer Science (UKM)</p>
								<p class="description">MIT (CSturt)</p>
								<p class="description">Senior Lecturer</p>
					
                            </div>
                            <div class="col-sm-2">
                                    <h3 class="drink"></h3>
                            </div>
                </div>
            
                    <div class="row">
                            <div class="col-sm-4">
                                <h3>Ms.Seetha Letchumi Sukumaran</h3>
                                <p class="description">BSc (Hons) CompSc</p>
								<p class="description">MSc CompSc (USM)</p>
								<p class="description">Senior Lecturer</p>
								
                            </div>
                            <div class="col-sm-2">
                                    <h3 class="drink"></h3>
                            </div>
                            <div class="col-sm-4">
                                    <h3>Ms.Anitha Velayutham</h3>
                                    <p class="description">BIT Info Sys</p>
									<p class="description">MBA (International Business) (Csturt)</p>
									<p class="description">Senior Lecturer</p>
                                </div>
                                <div class="col-sm-2">
                                        <h3 class="drink"></h3>
                                </div>
                    </div>
 
                        <div class="row">
                            <div class="col-sm-12">
                                <h2>Lecturers</h2>
                            </div>
                        </div>
            
                        <div class="row">
                                <div class="col-sm-4">
                                    <h3>Ms.Naline Shanmugam</h3>
                                    <p class="description">BIT (Hons) Artificial Intelligence (UKM)</p>
									<p class="description">Master of Computer Science (Multimedia)</p>
									<p class="description">Lecturer</p>
                                </div>
                                <div class="col-sm-2">
                                        <h3 class="drink"></h3>
                                </div>
                                <div class="col-sm-4">
                                        <h3>Mr Koon Kim Peh</h3>
                                        <p class="description">Teaches Networking, Microsoft Words, Excel, Powerpoint & Mobile App Inventor</p>
                                    </div>
                                    <div class="col-sm-2">
                                            <h3 class="drink"></h3>
                                    </div>
                        </div>
  
                            <div class="row">
                                    <div class="col-sm-4">
                                        <h3>Dr.Mustapha Muwafak </h3>
                                        <p class="description">Teaches Python Programming</p>
                                    </div>
                                    <div class="col-sm-2">
                                            <h3 class="drink"></h3>
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
