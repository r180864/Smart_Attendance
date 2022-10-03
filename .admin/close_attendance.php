
<div class="row my-5">
	<div class="col-lg-3">
		<?php
			if(isset($_POST['close']))
			{
				$subject=$_SESSION['subject'];
				echo "<form action='/../Attendance/.admin/home.php' method='POST'>";
				echo "<button class='btn btn-primary' type='submit' name='home' value='$subject'>Go to Home</button>";
				echo "</form>";
			}
		?>
	</div>
	<div class="col-lg-3">
		<?php 
			if(isset($_POST['close']))
			{
				$subject=$_SESSION['subject'];
				echo "<form action='/../Attendance/.admin/home.php' method='POST'>";
				echo "<button class='btn btn-secondary' type='submit' name='show_abscentees' value='$subject'>Show Abscentees</button>";
				echo "</form>";
			}
		?>
	</div>
	<div class="col-lg-3 bg-info">
		<?php  
			if(isset($_POST['close']))
			{
				$subject=$_SESSION['subject'];
				require('C:\xampp\htdocs\Attendance\mydb.php');
				$query="UPDATE ADMIN SET active=null;";
				$result=mysqli_query($connection, $query);

				echo "<a class='btn btn-success' id='print'>Download</a>";
			}
		?>
	</div>
	<div class="col-lg-3">
		<?php 
			if(isset($_POST['close']))
			{
				$subject=$_SESSION['subject'];
				echo "<form action='#' method='POST'>";
				echo "<button class='btn btn-success' type='submit' name='show_presentees' value='$subject'>Show Presentees</button>";
				echo "</form>";
			}
		?>
	</div>
</div>
