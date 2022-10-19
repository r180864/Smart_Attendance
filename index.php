<?php 
	session_start();
	$address=$_SERVER['REMOTE_ADDR'];
	echo $address;

	$error=null;
	$MAC = exec('getmac');
	$MAC = strtok($MAC, ' ');
	//echo $MAC;
	//print_r($_SESSION);

	require('C:\xampp\htdocs\Attendance\mydb.php');
	$query="SELECT active FROM ADMIN";
	$result=mysqli_query($connection, $query);
	while($row=mysqli_fetch_assoc($result))
	{
		$subject=$row['active'];
		//echo $subject;
	}
	$_SESSION['subject']=$subject;
	
	$query="SELECT sid FROM $subject WHERE address='$address' AND date=CURDATE();";
	$result=mysqli_query($connection, $query);
	//echo $query;
	if(mysqli_num_rows($result))
	{
		//echo "Already Submitted";
		
		
		while($row=mysqli_fetch_assoc($result))
		{
			echo $row['sid'].'<br>';
			$_SESSION['id']=$row['sid'];
		}
		//print_r($_SESSION);
		$_SESSION['address']=$address;
		header('Location:submitted.php');

	}
	else
	{
		if(isset($_POST['submit']))
		{
			$id=$_POST['id'];
			$section='Sec-B';
			echo "<h1>$id</h1>";
			$query="INSERT INTO $subject VALUES('$id', 'Present', '$address', CURDATE());";
			echo $query;
			$result=mysqli_query($connection, $query);
			if($result)
			{
				$_SESSION['id']=$id;
				header('Location:done.php');	
			}
			else
			{
				$error = "<h1 class='text-warning'>$id is not from Sec-B</h1>";
			}
			
		}
	}
	
	function islocal($address)
	{
		if($address)
		{

		}
	}

	function GetClientMac(){
    $macAddr=false;
    $arp=`arp -n`;
    $lines=explode("\n", $arp);

    foreach($lines as $line){
        $cols=preg_split('/\s+/', trim($line));

        if ($cols[0]==$_SERVER['REMOTE_ADDR']){
            $macAddr=$cols[2];
        }
    }

    return $macAddr;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Attendance</title>
	<link rel="icon" type="x-icon/image" href="/../Attendence/.images/logo.png">
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
				<?php echo $error;?>
			</div>
			<a href=".admin">Admin</a>
		</div>
	</div>
</body>
<script type="text/javascript">
	//$('#form')
</script>
</html>