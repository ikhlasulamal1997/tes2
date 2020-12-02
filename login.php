<!DOCTYPE html>
<?php session_start() ?>
<html lang="en">
	<head>
		<title>Kelas WEBMASTER</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="wraper">
			<h1 align="center">Login</h1>
			<form action="" method="POST">
				<input type="text" name="user" placeholder="username">
				<input type="password" name="pass" placeholder="password">
				<span class="checkbox">
				<label>
					<input type="checkbox" name="remember">
					Remember me
				</label>
				</span>
				<input type="submit" name="login" value="login">
				
			</form>
		<?php
			include "koneksi.php";
			if (isset($_POST['login'])) 
			{
			$name=$_POST['user'];
			$pass=$_POST['pass'];
				$check=mysqli_query($koneksi,"SELECT * FROM user WHERE username='$name' AND password='$pass'");
				$coba=mysqli_num_rows($check);
				if ($coba > 0) 
				{
					$ambildata=mysqli_fetch_array($check);
					$_SESSION["user"]=$ambildata["username"];
					$_SESSION["pass"]=$ambildata["password"];
					$_SESSION["akses"]=$ambildata["akses"];
					if ($ambildata['akses']=="admin") 
						{
							if (isset($_POST['remember'])) {
								setcookie('id',$ambildata['id'], time()+60);
								setcookie('key',hash('sha256', $ambildata["username"]), time()+60);
							}

							echo "<script>document.location.href='admin.php'</script>";	
						}else{
								if ($ambildata['status']=='aktif') 
								{
									echo "<script>document.location.href='user.php'</script>";
								}else{
									echo "Akun Kamu kami di Tinjau !";
									 }
							}
				}else{
					echo "Periksa Kembali Username & Passsword Kamu !";
					 }
			}
		?>
		</div>
	</body>
</html>