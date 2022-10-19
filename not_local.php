<?php 
	//session_start();
	//require('C:\xampp\htdocs\Attendance\mydb.php');
	$address=$_SERVER['REMOTE_ADDR'];
	//echo $address;
	if(islocal($address))
	{
		header('Location:/../Attendance/');
	}

	function islocal($address)
	{
		if($address)
		{
			$sub=substr($address, 0, 7);
			$list=explode('.', $address);
			//print_r($list);
			if($list[0]=='192' && $list[1]=='168')
			{
				return true;
			}
			return false;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Not Local</title>
	<link rel="icon" type="x-icon/image" href="/../Attendance/images/logo.png">
</head>
<body>
	<h1>You are not local to this network<br>Please stop <span style="color:red;">VPN</span> and try again</h1>
</body>
</html>