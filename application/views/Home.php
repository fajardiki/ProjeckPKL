<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
</head>
<body>
	<br>
	<a href="<?php base_url() ?> mahasiswa">Home</a>
	<a href="<?php base_url() ?> mahasiswa/nama">Nama</a>
	<a href="<?php base_url() ?> mahasiswa/gol">Golongan</a>
	<a href="<?php base_url() ?> mahasiswa/prodi">Prodi</a>
	<br><br>
	<h1>Hello, anda di home</h1>
	<br><br>

	<table style="border: 2 solid red">
		<tr>
			<td>Nama</td>
			<td><?php echo $nama ?></td>
		</tr>
		<tr>
			<td>NIM</td>
			<td><?php echo $nim ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><?php echo $alm ?></td>
		</tr>
	</table>
</body>
</html>