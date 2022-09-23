<?php 
	session_start();
	//print_r($_SESSION);

	if(isset($_POST['subject']))
	{
		$_SESSION['subject']=$_POST['subject'];
		$_SESSION['take_attendance']='no';
		$_SESSION['close']='no';
	}

	if(isset($_POST['take_attendance']))
	{
		$_SESSION['take_attendance']=$_POST['take_attendance'];
	}

	if(isset($_POST['close']))
	{
		$_SESSION['close']=$_POST['close'];
	}

	function set_subject($subject)
	{
		require('C:\xampp\htdocs\Attendance\mydb.php');
		$query="UPDATE ADMIN SET active='$subject';";
		$result=mysqli_query($connection, $query);
	}

	function take_attendance()
	{
		require('C:\xampp\htdocs\Attendance\mydb.php');
		$query="SELECT active FROM ADMIN;";
		$result=mysqli_query($connection, $query);
		while($row=mysqli_fetch_assoc($result))
		{
			$subject=$row['active'];
		}
	}
?>

<?php 
	function retrieve($subject)
	{
		require('C:\xampp\htdocs\Attendance\mydb.php');
		$query="SELECT id, $subject, date FROM ATTENDANCE WHERE $subject='Present';";
		$result=mysqli_query($connection, $query);
		if($result)
		{
			echo "<table id='table'><tr><th>ID Number</th><th>Subject</th><th>Status</th><th>Date</th></tr>";
			if(mysqli_num_rows($result)>0)
			{
				while($row=mysqli_fetch_assoc($result))
				{
					echo '<tr><td>'.$row['id'].'</td><td>'.$subject.'</td><td>'.'Present'.'</td><td>'.$row['date'].'</td></tr>';
					$_SESSION['date']=$row['date'];
				}
			}
			else
			{
				echo "<tr>No Records Found!</tr>";
			}
			echo "</table>";
		}
		else
		{
			echo "error: ".mysqli_error($connection)."<br>";
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
	<script src="/../Attendance/.jquery/table2excel/dist/jquery.table2excel.min.js">
</script>
</head>
<body onload= "javaScript:autoRefresh(5000);">
	<div class="container text-center mt-5">
		
		<div class="row" id='list'>
			<div class="col-lg-4 col-10 m-auto bg-light shadow">
				<?php 
					if($_SESSION['take_attendance']=='yes')
					{
						echo "<h1>Anil</h1>";
						set_subject($_SESSION['subject']);
						retrieve($_SESSION['subject']);
						//echo "YES";
						//session_destroy();
					}
				?>
			</div>
		</div>
		<div class="row" id='show'>
			<div class="col-lg-4 m-auto">
				<?php
					if(isset($_POST['subject']))
					{
						echo "<form action='#' method='POST'>";
						echo "<button class='btn btn-success' type='submit' name='take_attendance' value='yes'>Take Attendance</button>";
						echo "</form>";
					}
				
				?>
			</div>
		</div>
		<div class="row text-center mt-5" id='close'></div>
			<div>
				<?php 
					if($_SESSION['close']=='yes')
					{
						require('C:\xampp\htdocs\Attendance\mydb.php');
						$query="UPDATE ADMIN SET active=null;";
						$result=mysqli_query($connection, $query);

						echo "<a class='btn btn-success' id='print'>Download</a>";
					}
				?>
			</div>
			<div class="col-3 m-auto mt-3">
				<?php
					if($_SESSION['close']=='no' && $_SESSION['take_attendance']=='yes')
					{
						echo "<form action='#' method='POST'>";
						echo "<button class='btn btn-danger' type='submit' name='close' value='yes'>Close Attendance</button>";
						echo "</form>";
					}
					if($_SESSION['close']=='yes')
					{
						echo "<form action='/../Attendance/.admin/home.php' method='POST'>";
						echo "<button class='btn btn-primary' type='submit' name='close' value='yes'>Go to Home</button>";
						echo "</form>";
					}
				?>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function () {
		$('#print').click(function() {
			$('#table').table2excel({
				filename:"<?php echo $_SESSION['subject'].'_Attendance_'.$_SESSION['date'];?>"
			});
		});
	});

	function autoRefresh(t) {
		setTimeout("location.reload(true);", t);
	}
</script>
</html>