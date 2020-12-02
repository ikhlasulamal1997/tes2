<?php 
	$koneksi=mysqli_connect("localhost","root","","webmaster0418");
	//check connection
	if (!$koneksi) {
		die("Connection failed bro: " . mysqli_connect_error());
	}
 ?>