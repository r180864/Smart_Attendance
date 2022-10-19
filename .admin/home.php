<?php 
	if(isset($POST['logout']))
	{
		header('Location:/../Attendance/.admin/');
	}

	require('C:\xampp\htdocs\Attendance\mydb.php');
	$query="UPDATE ADMIN SET active=null;";
	$result=mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Subject</title>
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
  	<link href="/../Attendance/.bootstrap/css/bootstrap.min.css" rel="stylesheet">
  	<script src="/../Attendance/.bootstrap/js/bootstrap.bundle.min.js"></script>
  	
</head>
<body>
	<div class="container text-center my-5">
		<div class="row">
			<a href="/../Attendance/.admin/" class="btn btn-danger mb-5">Log Out</a>
			<div class="col-lg-4 col-10 m-auto bg-secondary">
				<h1>Select the Subject</h1>
				<form action="show.php" method="POST" class="form-floating m-2 ">
					<button type="submit" name="subject" value="SE" class="btn btn-primary form-control my-3">Software Engineering - <b>SE</b></button>
					<button type="submit" name="subject" value="CN" class="btn btn-primary form-control my-3">Computer Networks - CN</button>
					<button type="submit" name="subject" value="OS" class="btn btn-primary form-control my-3">Operating Syatem - OS</button>
					<button type="submit" name="subject" value="OOAD" class="btn btn-primary form-control my-3">Object Oriented Analysis & Design - OOAD</button>
					<button type="submit" name="subject" value="MFDS" class="btn btn-primary form-control my-3">Mathematical Foundation for DataScience - MFDS</button>
					<button type="submit" name="subject" value="ENGLISH_LAB" class="btn btn-primary form-control my-3">ENGLISH LAB</button>
					<button type="submit" name="subject" value="SE_LAB" class="btn btn-primary form-control my-3">Softwere Engineering - SE LAB</button>
					<button type="submit" name="subject" value="CN_LAB" class="btn btn-primary form-control my-3">Computer Networks - CN LAB</button>
					<button type="submit" name="subject" value="OS_LAB" class="btn btn-primary form-control my-3">Operating System - OS LAB</button>
				</form>
			</div>
			<div class="row">
				<div class="col-lg-4 m-auto my-5">
					<form action="delete.php">
						<button type="submit" class="btn btn-danger">Delete Previous Attendance</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>