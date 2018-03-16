<?php
include_once"../config/config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- ini digunakan untuk memanggil file css dari bootstrap -->
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
</head>
<body>
	<!-- ini untuk brand/logo dan menu -->
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="index.php">Mundak.in</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				 <ul class="nav navbar-nav">
					<li><a href="index.php">Home</a></li>
					<li><a href="komoditas.php">Komoditas</a></li>
					<li><a href="pasar.php">Pasar</a></li>
				</ul>
			</div>
	 	</div>
	</nav>
	<!-- penutup navigasi/menu -->


	<!-- content isi -->
	<div class="container">
			<h2>Data User ! Kenapa biar gede aja</h2>

		<!--Kembali ke data user-->
		<p>
			<a href="user.php" class="btn btn-warning">Back</a>
		</p>

		<div class="row col-sm-12 col-md-6">	
			
			<!--Menampilkan data dengan mysqli dan php-->
					<?php
						$id = $_GET['id'];
						$query = "SELECT * FROM anggaran_masuk INNER JOIN alokasi  id_m=id_a WHERE id_a='$id '";
						$exec = mysqli_query($konek,$query);
						$baris = mysqli_fetch_array($exec);
					?>
			<!--Walah walah-->					


			<form action="ubah.php" method="POST" name="isidatauser" class="form-group">
			<input type="hidden" name="id_m" value="<?=$baris['id_m']?>">
				<p>	
					<select name="id_m" class="form-control">
						<option selected> hm</option>
						<?php
							while ($data = mysqli_fetch_array($exec)) {			
						?>
						<option value='<?=$data['id_m']?>'><?=$data['id_m']?></option>";
						<?php
						}
						?>
					</select>

				</p>

				<p>
					<input type="text" name="alokasi" value="<?=$baris['alokasi']?>" class="form-control">
				</p>

				<p>
					<input type="text" name="catatan" value="<?=$baris['catatan']?>" class="form-control">
				</p>

				<p>
					<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
				</p>

			</form>
		</div>
	</div>
	<!-- penutup isi -->

	<!-- bagian bawah -->
	<footer>
		<p class="text-center">
			Copyright &copy; 2017 AkuSaya
		</p>
	</footer>
	<!-- penutup bagian bawah -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
</body>
</html>