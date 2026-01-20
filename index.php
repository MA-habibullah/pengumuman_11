<?php
// Set zona waktu sesuai lokasi server
date_default_timezone_set("Asia/Jakarta");

// Tanggal dan waktu mulai pengumuman
$start_time = strtotime("2026-01-13 20:30:00");
$current_time = time();

// Jika belum waktunya, tampilkan countdown
if ($current_time < $start_time) {
    $target_time_js = date("Y-m-d H:i:s", $start_time);
    echo "<!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <title>Pengumuman</title>
        <link href='css/bootstrap.min.css' rel='stylesheet'>
        <style>
            body {
                background-color: #f9f9f9;
                text-align: center;
                padding-top: 100px;
                font-family: Arial, sans-serif;
            }
            .timer {
                font-size: 2em;
                color: #333;
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <h2>Pengumuman Belum Tersedia</h2>
        <p>Pengumuman dapat diakses mulai:</p>
        <!--<h3>5 Mei 2025 pukul 15:00 WIB</h3>-->
        <div class='timer' id='countdown'>Memuat waktu...</div>

		<script>
			const countdownElement = document.getElementById('countdown');
			const targetTime = new Date('<?= $target_time_js ?>').getTime();

			const timer = setInterval(() => {
				const now = new Date().getTime();
				const distance = targetTime - now;

				if (distance <= 0) {
					clearInterval(timer);
					window.location.reload(); // Refresh halaman
				} else {
					const days = Math.floor(distance / (1000 * 60 * 60 * 24));
					const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
					const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
					const seconds = Math.floor((distance % (1000 * 60)) / 1000);

					countdownElement.innerHTML =
						days + ' hari ' + hours + ' jam ' + minutes + ' menit ' + seconds + ' detik';
				}
			}, 1000);
		</script>
    </body>
    </html>";
    exit();
}
?>


<?php include "database.php"; ?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengumuman TKA 2025</title> <!--Pengumuman Kelulusan-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="css/kelulusan.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/icon.png">
	<style>
        body { font-family: Arial; }
        table { border-collapse: collapse; width: 100%; margin-top: 15px; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background: #f2f2f2; }
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 4px;
            color: #fff;
            margin-right: 5px;
            font-size: 12px;
        }
        .view { background: #28a745; }
        .download { background: #007bff; }
    </style>
</head>

<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="./">SMA NEGERI 11 SURABAYA</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="./">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div align="center">
            <img src="./images/logo.jpeg" style="width: 10%" />
            <h2>Pengumuman TKA</h2> <!--Pengumuman Kelulusan-->

            <?php if (isset($_REQUEST["submit"])) {
                $nisn = $_REQUEST["nomor"];
                $hasil = mysqli_query(
                    $db_conn,
                    "SELECT * FROM un_siswa WHERE nisn= '$nisn'"
                );

                if (mysqli_num_rows($hasil) > 0) {
                    $data = mysqli_fetch_array($hasil); ?>
                    <table class="table table-bordered">
                        <tr>
                            <td>
                                <font size="3">NISN</font>
                            </td>
                            <td>
                                <font size="3"><?php echo $data[
                                    "nisn"
                                ]; ?></font>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <font size="3">Nama Lengkap</font>
                            </td>
                            <td>
                                <font size="3"><?php echo $data[
                                    "nama"
                                ]; ?></font>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <font size="3">Kelas</font>
                            </td>
                            <td>
                                <font size="3"><?php echo $data[
                                    "kelas"
                                ]; ?></font>
                            </td>
                        </tr>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="success">
                                <th class="text-center">
                                    <font size="3"> </font>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>
                                    <h1><b><?php echo $data[
                                        "status"
                                    ]; ?></b></h1>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- <div class="alert alert-success" role="alert" style="text-align:justify;">
                        <strong>
                            <font size="5">Pengumuman: </font>
                        </strong>
                        <ol>
                            <font size="3">
                                <li>Pengambilan Surat Keterangan Lulus dan Raport dilaksanakan mulai hari Selasa, 6 Mei 2024 mulai pukul 09.00 wib., sesuai jadwal yang telah ditentukan.</li>
                                <li>Seluruh siswa dilarang mengadakan Konvoi.</li>
                                <li>Seluruh siswa dilarang Corat-coret Baju dan Tembok.</li>
                                <li>Wajib menjaga nama baik almamater sekolah.</li>
                        </ol>
                        </font>
                        <strong>
                            <font size="5">Jadwal Pengambilan SKL & Raport:</font>
                        </strong>
                        <ol>
                            <font size="3">
                                <li>Selasa, 6 Mei 2024 : Kelas 12 1.1, 12 1.2, 12 1.3, 12 1.4 dan 12 2.1.</li>
                                <li>Rabu, 7 Mei 2024 : Kelas 12 2.2, 12 2.3, 12 3.1, 12 3.2 dan 12 3.3.</li>
                        </ol>
                        </font>
                        <strong>
                            <font size="5">Catatan Tambahan:</font>
                        </strong>
                        <ol>
                            <font size="3">
                                <li>Pengambilan SKL di ruang TU dengan membawa Pas Foto berwarna 4 x 6 dan Surat Bebas Pinjaman Perpustakaan.</li>
                                <li>Pengambilan Raport di wali kelas masing-masing</li>
                                <li>Bagi siswa yang meminjam TABLET dari sekolah diharapkan mengembalikan terlebih dahulu di ruang TU</li>
                                <li>Pada saat pengambilan SKL dan Raport, setiap siswa wajib memakai seragam sekolah dan bersepatu.</li>
                        </ol>
                        </font>
                    </div>-->
                <?php
// Ambil file siswa
$file_query = mysqli_query(
    $db_conn,
    "SELECT * FROM un_file WHERE nisn='$nisn'"
);

if (mysqli_num_rows($file_query) > 0) {
    echo "<h3>Daftar File</h3>";
    echo "<table class='table table-bordered'>
            <tr>
                <th>No</th>
                <th>Nama File</th>
                <th>Aksi</th>
            </tr>";

    $no = 1;
    while ($file = mysqli_fetch_array($file_query)) {

        //$nama_file = htmlspecialchars($file['nama_file']);
        //$path_view = "files/" . $nama_file;
      	$nama_file_asli = trim($file['nama_file']); // untuk file system
        $nama_file_view = htmlspecialchars($file['nama_file']); // untuk HTML
      
		//$path_download = "download.php?file=" . urlencode($nama_file_asli);

        echo "<tr>
                <td>{$no}</td>
                <td>{$nama_file_view}</td>
                <td class='text-center'>
                    <a class='btn btn-success btn-sm'
                       href='view.php?file=" . urlencode($nama_file_asli) . "'
                       target='_blank'>
                       View
                    </a>

                    <a class='btn btn-primary btn-sm' 
                       href='download.php?file=" . urlencode($nama_file_asli) . "'>
                        Download
                    </a>
                </td>
              </tr>";
        $no++;
    }
    echo "</table>";
} else {
    echo "<p><b>Tidak ada file untuk siswa ini.</b></p>";
}


                } else {
                    echo '<div class="alert alert-danger">Data tidak ditemukan atau belum waktunya pengumuman. Silakan hubungi admin!</div>';
                }
            } else {
                 ?>
                <div class="container my-4">
                    <!--<p>Peserta didik SMAN 11 SURABAYA Tahun Ajaran 2025/2026 dapat melihat pengumuman ini.</p>-->
                    <p>Peserta didik dapat mengunduh sertifikat TKA dan Melihat informasi PDSS.</p>
                    <p>Masukkan NISN:</p>
                    <form method="post">
                        <div class="form-group">
                            <input type="text" name="nomor" class="form-control" placeholder="Masukkan NISN" required>
                        </div>
                        <button class="btn btn-primary" type="submit" name="submit">Periksa</button>
                    </form>
                    <li style="text-align:justify;">
                        <font size="3">Jika lupa nisn bisa cek di --> <a href=https://nisn.data.kemdikbud.go.id/index.php/Cindex/formcaribynama style="color: #0d6efd" target="_blank">Cek NISN</a></font>
                    </li>
                </div>
            <?php
            } ?>
        </div>
    </div>
</body>

</html>