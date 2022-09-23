<?php 
	//session_start();
	require('C:\xampp\htdocs\Attendance\mydb.php');
	$query="SELECT active FROM ADMIN";
	$result=mysqli_query($connection, $query);
	while($row=mysqli_fetch_assoc($result))
	{
		$subject=$row['active'];
		//echo $subject;
	}

	if($subject)
	{
		header('Location:/../Attendance/');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Closed</title>
</head>
<body>
	<h1>Attendance is not taking now...<br>Please wait for next class</h1>
</body>
</html>