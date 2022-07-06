<h2><center>Laporan Absensi Guru</center></h2>
<hr/>
<table border="1" width="100%" style="text-align:center;">
	<tr>
		<th>No</th>
		<th>Nama Guru</th>
		<th>Jenis Kelamin</th>
		<th>Tanggal</th>
		<th>Keterangan</th>
	</tr>
	<?php 
	$number = 0;
	foreach ($pdfguru as $pg): ?>
		<tr>
			<td><?= ++$number; ?></td>
			<td><?= $pg['nama_guru'] ?></td>
			<td><?= $pg['jenis_kelamin'] ?></td>
			<td><?= $pg['tanggal'] ?></td>
			<td><?= $pg['keterangan'] ?></td>
		</tr>
	<?php endforeach ?>
</table>