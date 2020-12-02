<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Register</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="wraper">
			<h1 align="center">Register</h1>
			<form action="" method="post">
				<input type="text" name="fullname" placeholder="fullname" >
				<input type="text" name="user" placeholder="username">
				<input type="password" name="password" placeholder="password">
				<input type="radio" name="jenkel" value="laki-laki">Laki-Laki
				<input type="radio" name="jenkel" value="perempuan">Perempuan
				<input type="submit" name="register" value="register">
			</form>
		
		<?php 
			include "koneksi.php";
			if (isset($_POST["register"])) {
				$fullname= htmlspecialchars($_POST['fullname']);
				$user=htmlspecialchars($_POST['user']);
				$pass=htmlspecialchars($_POST['password']);
				$jkl=htmlspecialchars($_POST['jenkel']);
				$insert=mysqli_query($koneksi, "INSERT INTO `user` VALUES ('', '$fullname', '$user', '$pass', '$jkl', 'user','pending')");
				if ($insert) {
					echo "<script>document.location.href='login.php'</script>";
				}else{
					echo "Gagal Mendaftar";
				}
			}
		 ?>
		</div>
	</body>
</html>