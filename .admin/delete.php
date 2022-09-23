<?php  
	require('C:\xampp\htdocs\Attendance\mydb.php');
	$query="DELETE FROM ATTENDANCE;";
	$result=mysqli_query($connection, $query);
	header('Location:home.php');
	session_destroy();
?>