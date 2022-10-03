<?php 
	session_start();

	function set_subject($subject)
	{
		require('C:\xampp\htdocs\Attendance\mydb.php');
		$query="UPDATE ADMIN SET active='$subject';";
		$result=mysqli_query($connection, $query);
		if($result)
		{
			//echo $subject;
		}
		else
		{
			echo $query."<br>";
			echo "error: ".mysqli_error($result);
		}
	}

	function show_abscentees($subject)
	{	
		echo "<h1>Abscentees</h1>";
		echo "<a class='btn btn-success mb-3' id='download_abscentees'>Download</a>";
		require('C:\xampp\htdocs\Attendance\mydb.php');
		$query="SELECT * FROM SEC_B WHERE id NOT IN (SELECT sid FROM $subject WHERE date=CURDATE()) ORDER BY s_no;";
		$result=mysqli_query($connection, $query);
		if($result)
		{
			if(mysqli_num_rows($result))
			{
				echo "<table border id='abscent'>";
				echo "<yr><th>S. No</th><th>ID</th><th>Name</th><th>Subject</th><th>Status</th></tr>";
				while($row=mysqli_fetch_assoc($result))
				{
					echo "<tr><td>".$row['s_no']."</td><td>".$row['id']."</td><td>".$row['name']."</td><td>".$subject."</td><td>Abscent</td></tr>";
				}
				echo "</table>";
			}
		}
		else
		{
			echo $query."<br>";
			echo "error: ".mysqli_error($result);
		}
	}

	function show_presentees($subject)
	{
		echo "<h1>Presentees</h1>";
		echo "<a class='btn btn-success mb-3' id='download_presentees'>Download</a>";
		require('C:\xampp\htdocs\Attendance\mydb.php');
		$query="SELECT * FROM SEC_B WHERE id IN (SELECT sid FROM $subject WHERE date=CURDATE()) ORDER BY s_no;";
		$result=mysqli_query($connection, $query);
		if($result)
		{
			if(mysqli_num_rows($result))
			{
				echo "<table border id='present'>";
				echo "<yr><th>S. No</th><th>ID</th><th>Name</th><th>Subject</th><th>Status</th></tr>";
				while($row=mysqli_fetch_assoc($result))
				{
					echo "<tr><td>".$row['s_no']."</td><td>".$row['id']."</td><td>".$row['name']."</td><td>".$subject."</td><td>Present</td></tr>";
				}
				echo "</table>";
			}
		}
		else
		{
			echo $query."<br>";
			echo "error: ".mysqli_error($result);
		}
	}
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
  	
  	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="/../Attendance/.jquery/table2excel/dist/jquery.table2excel.min.js"></script>
	<style type="text/css">
		th, td {
	  		padding-left: 5px;
	  		padding-right: 5px;
		}
	</style>
</head>
<body onload= "javaScript:autoRefresh(5000);">
	<div class="container-flued mt-5">
			<?php
				if(isset($_POST['take_attendance']))
				{
					$subject=$_POST['take_attendance'];
					echo "<h1 style='text-align:center;' class='bg-secondary'>$subject Attendance</h1>";
					//echo $subject;
					set_subject($subject);
					echo '<div class="row justify-content-center">';
						echo '<div class="col-5 shadow bg-light me-5">';
							show_abscentees($subject);
						echo '</div>';

						echo '<div class="col-5 shadow bg-light ms-5">';
							show_presentees($subject);
						echo '</div>';
					echo '</div>';

					echo '<div class="row text-center">';
					require('C:\xampp\htdocs\Attendance\.admin\take_attendance.php');
					echo '</div>';
				}
			?>
		<div class="row text-center mt-5">
			<div class="col-lg-3 m-auto mt-5">
				<?php 
					if(isset($_POST['subject']))
					{
						$subject=$_POST['subject'];
						echo "<form action='#' method='POST'>";
						echo "<button class='btn btn-success' type='submit' name='take_attendance' value='$subject'>Take Attendance</button>";
						echo "</form>";
					}
				?>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	console.log("YESS");
	$(document).ready(function () {
		$('#download_abscentees').click(function() {
			$('#abscent').table2excel({
				filename:"<?php echo $subject.'_Abscentees_'.date('d-m-y');?>"
			});
		});
	});

	$(document).ready(function () {
		$('#download_presentees').click(function() {
			$('#present').table2excel({
				filename:"<?php echo $subject.'_Presentees_'.date('d-m-y');?>"
			});
		});
	});

	function autoRefresh(t) {
		setTimeout("location.reload(true);", t);
	}
</script>
</html>