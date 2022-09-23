<?php 
	session_start();
	$id=$_SESSION['id'];
	$subject=$_SESSION['subject'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Submitted</title>
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
  	<link href=".bootstrap/css/bootstrap.min.css" rel="stylesheet">
  	<script src=".bootstrap/js/bootstrap.bundle.min.js"></script>
  	
</head>
<body>
	<div class="container text-center mt-5">
		<div class="row">
			<div class="col-lg-4 col-10 m-auto bg-secondary">
				<h1 class="mt-3 text-warning">Already Submitted</h1>
				
				<h1>
					<?php 
						echo "ID: ".$id."<br>Subject: ".$subject;
					?>

				</h1>
			</div>
		</div>
	</div>
</body>
</html>