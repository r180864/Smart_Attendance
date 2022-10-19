
<div class="row my-5">
	<div class="col-lg-3 m-auto">
		<?php	
			echo "<form action='/../Attendance/.admin/home.php' method='POST'>";
			echo "<button class='btn btn-primary' type='submit' name='home' value=''>Go to Home</button>";
			echo "</form>";
		?>
	</div>
	<div class="col-lg-3 m-auto">
		<?php 
			if(!isset($_POST['close_attendance']))
			{
				//$subject=$_SESSION['subject'];
				echo "<form action='#' method='POST'>";
				echo "<button class='btn btn-danger' type='submit' name='close_attendance' value=''>Close Attendance</button>";
				echo "</form>";
			}
			else
			{
				close_attendance();
				//echo "Closed";
			}
		?>
	</div>
</div>
<?php 
	function close_attendance()
	{
		require('C:\xampp\htdocs\Attendance\mydb.php');
		$query="UPDATE ADMIN SET active=null";
		$result=mysqli_query($connection, $query);
		if($result)
		{
			//echo "YES";
		}
		else
		{
			//echo "NO";
		}
	}
?>
