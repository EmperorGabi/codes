<?php  session_start();
	$db = mysqli_connect('localhost', 'root', '', 'unregister'); ?>
<?php
//lecturer
  // initialize variables
  
	$lecturerID = "";
	$subjectCode = "";
	$subjectID = 0;
	$update4 = false;
	$results10 = mysqli_query($db, "SELECT * FROM subject ");
	$results13 = mysqli_query($db, "SELECT * FROM lecturer ");
	if (isset($_POST['save4'])) {
		$lecturerID = $_POST['lecturerID'];
		$subjectCode = $_POST['subjectCode'];
		mysqli_query($db, "INSERT INTO lecturerSubject ( lecturerID, subjectCode) VALUES ('$lecturerID', '$subjectCode')"); 
		$_SESSION['message'] = "Detail saved";
		header('location: systemAdmin_index.php');
	}
	if (isset($_POST['update4'])) {
    $subjectID = $_POST['subjectID'];
    $lecturerID = $_POST['lecturerID'];
		$subjectCode = $_POST['subjectCode'];


	mysqli_query($db, "UPDATE lecturerSubject SET   lecturerID='$lecturerID', subjectCode='$subjectCode'  WHERE subjectID='".$subjectID."'");
	$_SESSION['message'] = "Updated!"; 
	header('location: systemAdmin_index.php');
}
	

if (isset($_GET['del4'])) {
	$subjectID = $_GET['del4'];
	mysqli_query($db, "DELETE FROM lecturerSubject WHERE subjectID=$subjectID");
	$_SESSION['message'] = "Deleted!"; 
	header('location: systemAdmin_index.php');
}
	if (isset($_GET['edit4'])) {
		$subjectID = $_GET['edit4'];
		$update4 = true;
		$record4 = mysqli_query($db, "SELECT * FROM lecturerSubject WHERE subjectID=$subjectID ");

		if (count($record4) == 1 ) {
			$n4 = mysqli_fetch_array($record4);
			$subjectID = $n4['subjectID'];
			$subjectCode = $n4['subjectCode'];
			$lecturerID = $n4['lecturerID'];
		}
	}
	//register lecturer
  // initialize variables
  
  $lecturerID2 = "";
  $password = "";
  $id = 0;
  $update12 = false;
  $results12 = mysqli_query($db, "SELECT * FROM lecturer ");
  if (isset($_POST['save12'])) {
	  $lecturerID2 = $_POST['lecturerID'];
	  $password = $_POST['password'];
	  mysqli_query($db, "INSERT INTO lecturer ( lecturerID, password) VALUES ('$lecturerID2', '$password')"); 
	  header('location: systemAdmin_index.php');
  }
  if (isset($_POST['update12'])) {
  $id = $_POST['id'];
  $lecturerID2 = $_POST['lecturerID'];
	  $password = $_POST['password'];


  mysqli_query($db, "UPDATE lecturer SET   lecturerID='$lecturerID2', password='$password'  WHERE id='".$id."'"); 
  header('location: systemAdmin_index.php');
}
  

if (isset($_GET['del12'])) {
  $id= $_GET['del12'];
  mysqli_query($db, "DELETE FROM lecturer WHERE id=$id");
  header('location: systemAdmin_index.php');
}
  if (isset($_GET['edit12'])) {
	  $id = $_GET['edit12'];
	  $update12 = true;
	  $record4 = mysqli_query($db, "SELECT * FROM lecturer WHERE id=$id");

	  if (count($record4) == 1 ) {
		  $n4 = mysqli_fetch_array($record4);
		  $id = $n4['id'];
		  $password = $n4['password'];
		  $lecturerID2 = $n4['lecturerID'];
	  }
  }
  //student
  // initialize variables
  
	$studentID = "";
	$subjectCode2 = "";
	$subjectID2 = 0;
	$results14 = mysqli_query($db, "SELECT * FROM users ");
	$update = false;

	if (isset($_POST['save'])) {
		$studentID = $_POST['studentID'];
		$subjectCode2 = $_POST['subjectCode'];
		mysqli_query($db, "INSERT INTO studentSubject ( studentID, subjectCode) VALUES ('$studentID', '$subjectCode2')"); 
		$_SESSION['message'] = "Detail saved";
		header('location: systemAdmin_index.php');
	}
	if (isset($_POST['update'])) {
    $subjectID2 = $_POST['subjectID'];
    $studentID = $_POST['studentID'];
		$subjectCode2 = $_POST['subjectCode'];


	mysqli_query($db, "UPDATE studentSubject SET   studentID='$studentID', subjectCode='$subjectCode2'  WHERE subjectID='".$subjectID2."'");
	$_SESSION['message'] = "Updated!"; 
	header('location: systemAdmin_index.php');
}
	

if (isset($_GET['del'])) {
	$subjectID2 = $_GET['del'];
	mysqli_query($db, "DELETE FROM studentSubject WHERE subjectID=$subjectID2");
	$_SESSION['message'] = "Deleted!"; 
	header('location: systemAdmin_index.php');
}
	if (isset($_GET['edit'])) {
		$subjectID2 = $_GET['edit'];
		$update4 = true;
		$record4 = mysqli_query($db, "SELECT * FROM studentSubject WHERE subjectID=$subjectID2 ");

		if (count($record4) == 1 ) {
			$n4 = mysqli_fetch_array($record4);
			$subjectID2 = $n4['subjectID'];
			$subjectCode2 = $n4['subjectCode'];
			$studentID = $n4['studentID'];
		}
	}


	 //courses
  // initialize variables
  
  $subjectName = "";
  $subjectCode3 = "";
  $image = "";
  $status="No";
  $subjectID3 = 0;
  $update3 = false;
  $results11 = mysqli_query($db, "SELECT * FROM subject ");
  if (isset($_POST['save3'])) {
	  $subjectName = $_POST['subjectName'];
	  $subjectCode3 = $_POST['subjectCode'];
	  $image= $_POST['image'];
	  mysqli_query($db, "INSERT INTO subject ( subjectName, subjectCode,image,status) VALUES ('$subjectName', '$subjectCode3', '$image', '$status')"); 
	  $_SESSION['message'] = "Detail saved";
	  header('location: systemAdmin_index.php');
  }
  if (isset($_POST['update3'])) {
  $subjectID3 = $_POST['subjectID'];
  $subjectCode3 = $_POST['subjectCode'];
  $subjectName = $_POST['subjectName'];
  $image = $_POST['image'];


  mysqli_query($db, "UPDATE subject SET   subjectName='$subjectName', subjectCode='$subjectCode3', image='$image'  WHERE subjectID='".$subjectID3."'");
  $_SESSION['message'] = "Updated!"; 
  header('location: systemAdmin_index.php');
}
  

if (isset($_GET['del3'])) {
  $subjectID3 = $_GET['del3'];
  mysqli_query($db, "DELETE FROM subject WHERE subjectID=$subjectID3");
  $_SESSION['message'] = "Deleted!"; 
  header('location: systemAdmin_index.php');
}
if (isset($_GET['edit3'])) {
	$subjectID3 = $_GET['edit3'];
	$update3 = true;
	$record4 = mysqli_query($db, "SELECT * FROM subject WHERE subjectID=$subjectID3 ");
	if (count($record4) == 1 ) {
		$n4 = mysqli_fetch_array($record4);
		$subjectID3 = $n4['subjectID'];
		$subjectCode3 = $n4['subjectCode'];
		$subjectName = $n4['subjectName'];
		$image = $n4['image'];
	}

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link href="css/adminIndexCss.css" rel="stylesheet" type="text/css">
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
	margin-left:10px;
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
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">System Admin <span class="glyphicon glyphicon-user pull-right"></span></a>
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
   <a href="systemAdmin_index.php">Home</a> 
  
</div>
</nav>

<body>
<main>
<div class="container">
<h2 style="margin-top:50px;">Manage Projects</h2>
<?php $results3 = mysqli_query($db, "SELECT * FROM subject ORDER BY subjectID"); ?>
	<table>
		<thead>
			<tr>
				<th>Subject Code</th>
				<th>Subject Name</th>
				<th>image</th>
				<th colspan="2">Action</th>

			</tr>
		</thead>

		<?php while ($row3 = mysqli_fetch_array($results3)) { ?>
		
			<tr>
				<td><?php echo $row3['subjectCode']; ?></td>
				<td><?php echo $row3['subjectName']; ?>  </td>
				<td><img src="pics/<?php echo $row3['image']; ?>" width="200">  </td>
				<td>
					<a href="systemAdmin_index.php?edit3=<?php echo $row3['subjectID']; ?>" >Edit</a>
				</td>
				<td>
					<a href="systemAdmin_index.php?del3=<?php echo $row3['subjectID']; ?>">Delete</a>
				</td>
			</tr>
		<?php } ?>
	</table>
<div class="form-style-5">
  <form  method="post" action="#" >
	<input type="hidden" name="subjectID" value="<?php echo $subjectID3; ?>">
		<div class="input-group">
			<label>Subject Code</label>
			<input type="text" name="subjectCode" value="<?php echo $subjectCode3; ?>" required>
		</div>
		<div class="input-group">
			<label>Subject Name</label>
			<input type="text" name="subjectName" value="<?php echo $subjectName; ?>" required>
		</div>
		<div class="input-group">
			<label>Image</label>
			<input type="file" name="image" value="<?php echo $image; ?>" required>
		</div>
		<div class="input-group">
			<?php if ($update3 == true): ?>
				<button class="btn" type="submit" name="update3" style="background: #556B2F;" >Update</button>
			<?php else: ?>
				<button class="btn" type="submit" name="save3" >Save</button>
			<?php endif ?>
		</div>
		 
	</form>
</div>
<br><br>
<h2>Register Lecturers</h2>
<?php $results12 = mysqli_query($db, "SELECT * FROM lecturer ORDER BY id"); ?>
	<table>
		<thead>
			<tr>
				<th>Lecturer ID</th>
				<th>Password</th>
				<th colspan="2">Action</th>

			</tr>
		</thead>

		<?php while ($row12 = mysqli_fetch_array($results12)) { ?>
		
			<tr>
				<td><?php echo $row12['lecturerID']; ?></td>
				<td><?php echo $row12['password']; ?>  </td>
				<td>
					<a href="systemAdmin_index.php?edit12=<?php echo $row12['id']; ?>" >Edit</a>
				</td>
				<td>
					<a href="systemAdmin_index.php?del12=<?php echo $row12['id']; ?>">Delete</a>
				</td>
			</tr>
		<?php } ?>
	</table>
<div class="form-style-5">
  <form  method="post" action="#" >
	<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Lecturer ID</label>
			<input type="text" name="lecturerID" value="<?php echo $lecturerID2; ?>" required>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" value="<?php echo $password; ?>" required>
		</div>
		<div class="input-group">
			<?php if ($update12 == true): ?>
				<button class="btn" type="submit" name="update12" style="background: #556B2F;" >Update</button>
			<?php else: ?>
				<button class="btn" type="submit" name="save12" >Save</button>
			<?php endif ?>
		</div>
		 
	</form>
</div>
<br><br>
<h2>Enrol Lecturers as project supervisors to Students</h2>
<?php $results = mysqli_query($db, "SELECT * FROM lecturerSubject ORDER BY subjectID"); ?>
	<table>
		<thead>
			<tr>
				<th>Subject Code</th>
				<th>Lecturer ID</th>Fsubject 
				<th colspan="2">Action</th>

			</tr>
		</thead>

		<?php while ($row = mysqli_fetch_array($results)) { ?>
		
			<tr>
				<td><?php echo $row['subjectCode']; ?></td>
				<td><?php echo $row['lecturerID']; ?>  </td>
				<td>
					<a href="systemAdmin_index.php?edit4=<?php echo $row['subjectID']; ?>" >Edit</a>
				</td>
				<td>
					<a href="systemAdmin_index.php?del4=<?php echo $row['subjectID']; ?>">Delete</a>
				</td>
			</tr>
		<?php } ?>
	</table>
<div class="form-style-5">
  <form  method="post" action="#" >
	<input type="hidden" name="subjectID" value="<?php echo $subjectID; ?>">
		<div class="input-group">
			<label>Subject Code   </label>
			<select  name="subjectCode" >
			<?php while ($row10 = mysqli_fetch_array($results10)) { ?>
				<option value="<?php echo $row10['subjectCode']; ?>"  <?php if($row10['subjectCode']===$subjectCode) echo 'selected="selected"';?>><?php echo $row10['subjectCode']; ?></option>
				<?php } ?>
			</select>
			
		</div>
		<div class="input-group">
			<label>LecturerID   </label>
			<select  name="lecturerID" >
			<?php while ($row10 = mysqli_fetch_array($results13)) { ?>
				<option value="<?php echo $row10['lecturerID']; ?>"  <?php if($lecturerID===$row10['lecturerID']) echo 'selected="selected"';?>><?php echo $row10['lecturerID'] ?></option>
				<?php } ?>
			</select>
			
		</div>
		<div class="input-group">
			<?php if ($update4 == true): ?>
				<button class="btn" type="submit" name="update4" style="background: #556B2F;" >Update</button>
			<?php else: ?>
				<button class="btn" type="submit" name="save4" >Save</button>
			<?php endif ?>
		</div>
		 
	</form>
</div>
<br><br>


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

 
   
