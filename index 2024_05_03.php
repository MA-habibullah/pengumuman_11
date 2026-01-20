<?php
include "database.php";
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="Info kode aktivasi AKM SMAN 11 Surabaya">
	<meta name="author" content="maulana.ahmadhabibullah.22@gmail.com">
	<title>Pengumuman Kelulusan</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/jasny-bootstrap.min.css" rel="stylesheet">
	<link href="css/kelulusan.css" rel="stylesheet">
	<link rel="shortcut icon" href="images/icon.png">
</head>

<body>
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="./">SMA NEGERI 11 SURABAYA</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="./">Home</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="contact.php">Contact</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>

	<div class="container">
		<div align="center"><img src="./images/logo.jpeg" style="width: 10%" "height: 10%">
			<h2 align="center">Pengumuman Kelulusan</h2>

			<?php
			if (isset($_REQUEST['submit'])) {
				//tampilkan hasil queri jika ada
				$nisn = $_REQUEST[addslashes('nomor')];

				$hasil = mysqli_query($db_conn, "SELECT * FROM un_siswa WHERE nisn= '$nisn'");
				if (mysqli_num_rows($hasil) > 0) {
					$data = mysqli_fetch_array($hasil);

			?>
					<table class="table table-bordered">
						<tr style="width: 35%">
							<td>NISN</td>
							<td style="width: 65%"><?php echo $data['nisn']; ?></td>
						</tr>
						<tr>
							<td>Nama Lengkap</td>
							<td><?php echo $data['nama']; ?></td>
						</tr>
						<tr>
							<td>Jurusan</td>
							<td><?php echo $data['kelas']; ?></td>
						</tr>
						<!-- <tr><td>Username</td><td><?php echo $data['ttl']; ?></td></tr>
			    <tr><td>Password</td><td><?php echo $data['jk']; ?></td></tr> -->
					</table>
					<table class="table table-bordered">
						<thead>
							<tr class="success">
								<th class="text-center" style="width: 33,33%">
									<font size="3">Dengan ini Anda Dinyatakan:</font>
								</th>
							</tr>
						</thead>
						<tbody class="text-center">
							<td>
								<h1><b><?php echo $data['status']; ?></b></h1>
							</td>
						</tbody>
					</table>
					<div class="alert alert-success" role="alert" style="text-align:justify;"><strong>
							<font size="4">Pengumuman: </font>
						</strong>
						<ol>
							<font size="3">
								<li value="1"> Pengambilan Surat Keterangan Lulus dan Raport dilaksanakan mulai hari Selasa, 7 Mei 2024 mulai pukul 09.00 wib., sesuai jadwal yang telah ditentukan. </li>
								<li>Seluruh siswa dilarang mengadakan Konvoi.</li>
								<li>Seluruh siswa dilarang Corat-coret Baju dan Tembok.</li>
								<li>Setiap siswa wajib menjaga nama baik almamater Sekolah.</li>
							</font>
						</ol>
						<strong>
							<font size="4">Jadwal Pengambilan Surat Keterangan LULUS dan RAPORT :</font>
						</strong>
						<ol>
							<font size="3">
								<li value="1">Selasa, 7 Mei 2024 : Kelas 12 IPA 1 dan 12 IPA 6.</li>
								<li>Rabu, 8 Mei 2024 : Kelas 12 IPS 1 dan 12 IPS 5.</li>
							</font>
						</ol>
						<strong>
							<font size="4">Catatan Tambahan :</font>
						</strong>
						<ol>
							<font size="3">
								<li value="1">Pengambilan SKL di ruang TU dengan membawa Pas Foto berwarna 4 x 6 dan Surat Bebas Pinjaman Perpustakaan.</li>
								<li>Pengambilan Raport di wali kelas masing-masing.</li>
								<li>Bagi siswa yang meminjam TABLET dari sekolah diharapkan mengembalikan terlebih dahuludi runag TU</li>
								<li>Pada saat pengambilan SKL dan Raport, setiap siswa wajib memakai seragam sekolah dan bersepatu.</li>
							</font>
						</ol>
						<!--<?php
							echo $data['pesan'];
							?> -->
					</div>
					<!--<button><a href="dokumen/<?php echo $data['file']; ?>" target="_blanks">Unduh Surat Keterangan Lulus</a></button> -->
				<?php
				} else {
					echo 'Data yang anda inputkan tidak ditemukan atau belum waktunya pengumuman. </br>Silahkan hubungi admin atau petugas administrasi sekolah!';
					//tampilkan pop-up dan kembali tampilkan form
				}
			} else {
				//tampilkan form input nomor ujian
				?>
				<p>Peserta didik yang dapat melihat pengumuman ini </br> adalah Peserta Didik SMAN 11 SURABAYA </br> Tahun Ajaran 2023/2024.</p>
				<p>Masukkan NISN.</p>
				<form method="post">
					<div class="input-group">
						<input type="text" name="nomor" class="form-control" placeholder="Masukkan NISN" required>
						<span class="input-group-btn">
							<button class="btn btn-primary" type="submit" name="submit">Periksa</button>
						</span>
					</div>
				</form>
			<?php
			}
			?>
			<p></p>
			<p align="left">Catatan: </br>
				<!-- 		<li style="text-align:justify;">Mohon data ini digunakan sebagaimana mestinya dan harap untuk tidak diberikan kepada orang lain.</li>
		<li style="text-align:justify;">Silahkan klik link url ini untuk mengerjakan ujian Penilaian tengah Semester </li>
		<pre style="text-align:justify;"> kelas 10 <a href="http://cbt10.intranet/" style="color: #0d6efd"target="_blank"> klik disini </a> </pre>
		<pre style="text-align:justify;"> kelas 11 <a href="http://cbt11.intranet/" style="color: #0d6efd"target="_blank"> klik disini </a> </pre>
		<pre style="text-align:justify;"> kelas 12 <a href="http://cbt12.intranet/" style="color: #0d6efd"target="_blank"> klik disini </a> </pre> -->

				<!--<li style="text-align:justify;">Jika terjadi kendala selama ujian bisa menghubungi nomor <a href=https://wa.me/083857444909 style="color: #0d6efd" target="_blank">083857444909</a> (habib).</li>-->
				<li style="text-align:justify;">Jika lupa nisn bisa cek di --> <a href=https://nisn.data.kemdikbud.go.id/index.php/Cindex/formcaribynama style="color: #0d6efd" target="_blank">Cek NISN</a></li>
				</br></br></br>
				</br>



				<!--<li style="text-align:justify;">silahkan unduh panduan link berikut <a href="https://bit.ly/3xziDib" style="color: #0d6efd">Panduan AKM</a></li></p>
		<p></p>-->

		</div><!-- /.container -->

		<footer class="footer">
			<div class="container">
				<p class="text-muted">&copy; 2024 &middot; SMA NEGERI 11 SURABAYA</p>
			</div>
		</footer>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jasny-bootstrap.min.js"></script>
</body>

</html>