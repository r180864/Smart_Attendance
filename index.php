<?php 
	session_start();
	$address=$_SERVER['REMOTE_ADDR'];
	//echo $address;

	$MAC = exec('getmac');
	$MAC = strtok($MAC, ' ');
	//echo $MAC;
	print_r($_SESSION);

	require('C:\xampp\htdocs\Attendance\mydb.php');
	$query="SELECT active FROM ADMIN";
	$result=mysqli_query($connection, $query);
	while($row=mysqli_fetch_assoc($result))
	{
		$subject=$row['active'];
		//echo $subject;
	}
	$_SESSION['subject']=$subject;
	
	$query="SELECT id FROM ATTENDANCE WHERE address='$address';";
	$result=mysqli_query($connection, $query);
	if(mysqli_num_rows($result))
	{
		//echo "Already Submitted";
		
		
		while($row=mysqli_fetch_assoc($result))
		{
			$_SESSION['id']=$row['id'];
		}
		header('Location:submitted.php');

	}
	else
	{
		if(isset($_POST['submit']))
		{
			$id=$_POST['id'];
			$section='Sec-B';
			$query="SELECT id FROM ATTENDANCE WHERE id='$id';";
			$result=mysqli_query($connection, $query);
			if(mysqli_num_rows($result))
			{
				$query="UPDATE ATTENDANCE SET $subject='Present', address='$address' WHERE id='$id';";
				$result=mysqli_query($connection, $query);
				if($result)
				{
					//echo "Success";
				}
				else
				{
					//echo "FAIL";
				}
				echo "<br>".$query;
				//echo "<h1>Updated</h1>";
			}
			else
			{
				$query="INSERT INTO ATTENDANCE(id, date, section, $subject, address) VALUES('$id', CURDATE(), '$section', 'Present', '$address')";
				$result=mysqli_query($connection, $query);
				if($result)
				{
					//echo "Success";
				}
				//echo "<h1>Inserted</h1>";
				//header('Location:submitted.php');
			}
			header('Location:done.php');
			$_SESSION['id']=$id;
		}
		
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Attendance</title>
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
  	<link href=".bootstrap/css/bootstrap.min.css" rel="stylesheet">
  	<script src=".bootstrap/js/bootstrap.bundle.min.js"></script>

</head>
<body>
	<div class="container text-center mt-5">
		<div class="row mt-3">
			<div class="col-lg-4 col-10 m-auto bg-secondary">
				<h1>Submit Attendance<br><b><?php
												if($subject) {echo $subject;}
												else {header('Location:closed.php');}
											?></b></h1>
				<form action="#" method="POST" class="form-floating m-2" id='form'>
					<div class="form-floating mt-3">
						<input type="text" name="id" class="form-control" placeholder="">
						<label for="#id" class="form-label">Enter ID</label>
					</div>

					<button type="submit" name="submit" value="submit" class="btn btn-success form-control my-3">Present</button>
				</form>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	//$('#form')
</script>
</html>