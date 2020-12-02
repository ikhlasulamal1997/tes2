<!DOCTYPE html>
<?php session_start();  ?>
<?php include"koneksi.php"; ?>
<html>
	<head>
		<title>FORM ADMIN</title>
	</head>
	<body>
		<?php 
			if (isset($_COOKIE['id']) AND isset($_COOKIE['key']) ) {
				$id=$_COOKIE['id'];
				$key=$_COOKIE['key'];
				$check2=data("SELECT * FROM user WHERE id = $id");
				$ambildata2=mysqli_fetch_array($check2);
				if ($key === hash('sha256', $ambildata2["username"])) {
					$_SESSION["user"]= true;
				}
			}	
				if (isset($_SESSION["akses"])) {
				}else{
					echo "<script>document.location.href='login.php'</script>";
					 }
			?>
		<h1 align="center">Data User</h1>
			<table width="100%"" bgcolor="orange" border="1">
			<tr>
				<th>No</th>
				<th>Fullname</th>
				<th>Username</th>
				<th>Password</th>
				<th>Jenis Kelamin</th>
				<th>Akses</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			<?php
				if (isset($_GET['deleteuser'])) {
					$id=$_GET['deleteuser'];
					$deletesa=mysqli_query($koneksi, "DELETE FROM user WHERE id = '$id'");
					if ($deletesa) {
						echo "Berhasil Menghapus";
					}else{
						echo "Gagal Menghapus";
					}
				}
				$no=1;
				$check=mysqli_query($koneksi,"SELECT * FROM user WHERE akses='user'");
				$coba=mysqli_num_rows($check);
				if ($coba>0) 
				{ 
				while ($ambildata=mysqli_fetch_array($check)){
			?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $ambildata["fullname"]; ?></td>
					<td><?php echo $ambildata["username"]; ?></td>
					<td><?php echo $ambildata["password"]; ?></td>
					<td><?php echo $ambildata["jkl"]; ?></td>
					<td><?php echo $ambildata["akses"];?></td>
					<td><?php echo $ambildata["status"];?></td>
					<td><a href="admin.php?edit=<?php echo $ambildata['id']; ?>">Edit</a> | <a href="admin.php?deleteuser=<?php echo $ambildata['id']; ?>">Delete</a></td>
					
				</tr>
			<?php 

					}
				}else{
					echo "Data Tidak Ditemukan";
				}
			?>
		</table>

		<?php if (isset($_GET['edit'])) { 
			$id=$_GET['edit'];
			$checkdata=mysqli_query($koneksi,"SELECT * FROM user WHERE id='$id'");
			$tampilkandata=mysqli_fetch_array($checkdata);
		?>
			<form action="" method="POST">
				<table>
					<tr>
						<td>Fullname</td>
						<td><input type="text" name="fullname" value="<?php echo $tampilkandata['fullname']; ?>"></td>
					</tr>
					<tr>
						<td>Username</td>
						<td><input type="text" name="username" value="<?php echo $tampilkandata['username']; ?>"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="password" value="<?php echo $tampilkandata['password']; ?>"></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td><input type="radio" name="jenkel" value="laki-laki"<?php if($tampilkandata['jkl']=='laki-laki'){echo 'checked';}?>
							>Laki-Laki
							<input type="radio" name="jenkel" value="perempuan"<?php if($tampilkandata['jkl']=='perempuan'){echo 'checked';}?>>perempuan
						</td>
					</tr>
					<tr>
						<td>Status</td>
						<td>
							<select name="status">
								<option value="pending" 
									<?php 
										if($tampilkandata['status']=='pending'){
											echo 'selected';
										}
									?>
								>Pending</option>
								<option value="aktif" <?php if($tampilkandata['status']=='aktif'){echo 'selected';}?>>Aktif</option>
							</select>
						</td>
					</tr>

					<tr>
						<td></td>
						<td><input type="submit" name="update" value="Simpan"></td>
					</tr>
				</table>	
			</form>

		<?php
			if (isset($_POST["update"])) {
				$fullname=$_POST['fullname'];
				$user=$_POST['username'];
				$pass=$_POST['password'];
				$jkl=$_POST['jenkel'];
				$status=$_POST['status'];
				$insert=mysqli_query($koneksi, "UPDATE `user` SET `fullname` = '$fullname', `username` = '$user', `password` = '$pass', `jkl` = '$jkl', `status` = '$status' WHERE `user`.`id` = $id;");
				if ($insert) {
					echo "<script>document.location.href='admin.php'</script>";
				}else{
					echo "Gagal Update";
				}
			}

		}
		 ?>
		<a href="logout.php">LOGOUT</a></br></br>
		<a href="admin.php">REFRESH</a>
		<script src="function.js"></script>
	</body>
</html>