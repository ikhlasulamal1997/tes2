<html lan="id">
	<head>
		<title> Kelas Webmaster</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<form action="" method="POST">
			<input type="text" name="no1" >
			<select name="op">
				<option value="">Pilih Operator</option>
				<option value="+">+</option>
				<option value="-">-</option>
				<option value="*">*</option>
				<option value="/">/</option>
			</select>
			<input type="text" name="no2" >
			<input type="submit" name="hitung" value="hitung">
		</form>
		<?php
		// Fungsi Isset adalah untuk memeriksa
			if (isset($_POST["hitung"])) { 
			$no=$_POST["no1"];
			$no2=$_POST["no2"];	
			$operator=$_POST["op"];

			if ($operator=="+") {
				echo $no + $no2;
			}elseif ($operator=="-") {
				echo $no - $no2;
			}elseif ($operator=="*") {
				echo $no * $no2;
			}elseif ($operator=="/") {
				echo $no / $no2;
			}else{
				echo "Belum di input";
			}
		}else{
				echo "Angka belum anda masukkan";
		}

		?>
	</body>
</html>