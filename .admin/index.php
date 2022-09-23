<?php 
	if(isset($_POST['submit']))
	{
		$error=validate($_POST['id'], $_POST['pwd']);
		$_SESSION['error']=$error;
	}


	function validate($id, $pwd)
	{
		if(empty(ltrim(rtrim($id))))
		{
			$error="ID is required";
			return $error;
		}
		if(empty(ltrim(rtrim($pwd))))
		{
			$error="Password is required";
			return $error;
		}
		require('C:\xampp\htdocs\Attendance\mydb.php');

		$query="SELECT * FROM ADMIN WHERE id='$id';";
		$result=mysqli_query($connection, $query);
		if($result)
		{
			if(mysqli_num_rows($result)===1)
			{
				while($row=mysqli_fetch_assoc($result))
				{
					//echo print_r($row);
					if($row['password']==$pwd)
					{
						header("Location:home.php");
					}
					else
					{
						$error="Invalid Password";
						return $error;
					}

				}
			}
			else
			{
				$error="Invalid ID";
				return $error;
			}
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
	<title>Admin</title>
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
  	<link href="/../Attendance/.bootstrap/css/bootstrap.min.css" rel="stylesheet">
  	<script src="/../Attendance/.bootstrap/js/bootstrap.bundle.min.js"></script>
  	
</head>
<body>
	<div class="container text-center mt-5">
		<div class="row">
			<div class="col-lg-4 col-10 m-auto bg-secondary">
				<h1 class="mt-3 text-warning">Admin Login</h1>
				<form action="#" method="POST" class="form-floating m-2 ">
					<p class="text-danger text-center">
						<?php
							if(isset($error))
							{
								echo $error;
							} 
						?>
					</p>
					<div class="form-floating mt-3">
						<input type="text" name="id" class="form-control" placeholder="">
						<label for="#id" class="form-label">Enter ID</label>
					</div>

					<div class="form-floating mt-3">
						<input type="password" name="pwd" class="form-control" placeholder="">
						<label for="#pwd" class="form-label">Enter Password</label>
					</div>
					<button type="submit" name="submit" value="submit" class="btn btn-primary form-control my-3">Log In</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>