
<div class="row my-5">
	<div class="col-lg-3 m-auto">
		<?php	
			echo "<form action='/../Attendance/.admin/home.php' method='POST'>";
			echo "<button class='btn btn-primary' type='submit' name='home' value='$subject'>Go to Home</button>";
			echo "</form>";
		?>
	</div>
	<div class="col-lg-3 bg-info m-auto">
		<?php 
			//$subject=$_SESSION['subject'];
			echo "<form action='#' method='POST'>";
			echo "<button class='btn btn-danger' type='submit' name='close' value='$subject'>Close Attendance</button>";
			echo "</form>";
		?>
	</div>
</div>
