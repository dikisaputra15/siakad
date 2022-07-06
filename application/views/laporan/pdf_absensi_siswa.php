<h2><center>Laporan Absensi Siswa</center></h2>
<hr/>
<table border="1" width="100%" style="text-align:center;">
	<tr>
		<th>No</th>
		<th>Nama Siswa</th>
		<th>Jenis Kelamin</th>
		<th>Tanggal</th>
		<th>Keterangan</th>
	</tr>
	<?php 
	$number = 0;
	foreach ($pdfsiswa as $ps): ?>
		<tr>
			<td><?= ++$number; ?></td>
			<td><?= $ps['nama_siswa'] ?></td>
			<td><?= $ps['jenis_kelamin'] ?></td>
			<td><?= $ps['tanggal'] ?></td>
			<td><?= $ps['keterangan'] ?></td>
		</tr>
	<?php endforeach ?>
</table>