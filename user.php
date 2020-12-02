<!DOCTYPE html>
<html>
<head>
	<title>FORM USER</title>
	<link rel="stylesheet" href="screen.css">
</head>
<body>
	<div class="container">
		<img src="img/logo2.png" width="150px" height="150px">
		<div class="wraper">
			<ul>
				<li>Home</li>
				<li>Post</li>
				<li>Page</li>
				<li>User</li>
				<li>Setting</li>
			</ul>
		</div>
		<div class="wraper1">
			<?php 
				session_start();
				if (isset($_SESSION["user"])) {
					echo "WELCOME "."</br>". $_SESSION["user"];
				}else{
					echo "<script>document.location.href='login.php'</script>";
					 }
			?>
		</div>
		<div class="logout">
		<a href="logout.php"> <input type="submit" name="logout" value="LOGOUT"></input> </a>
		</div>
	</div>
</body>
</html>




