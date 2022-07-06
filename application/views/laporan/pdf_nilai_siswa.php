<h2><center>Laporan Nilai Siswa</center></h2>
<hr/>
<table>
	<tr>
		<td>NISN</td>
		<td>:</td>
		<td><?= $siswa['nisn']; ?></td>

		<td>Kelas</td>
		<td>:</td>
		<td><?= $siswa['kelas']; ?></td>
	</tr>
	<tr>
		<td>Nama Siswa</td>
		<td>:</td>
		<td style="width: 400px;"><?= $siswa['nama_siswa']; ?></td>

		<td>Jenis Kelamin</td>
		<td>:</td>
		<td><?= $siswa['jenis_kelamin']; ?></td>
	</tr>
</table>
<table border="1" width="100%" style="text-align:center;">
	<tr>
		<th>No</th>
		<th>Mata Pelajaran</th>
		<th>Nilai PTS</th>
		<th>Nilai PAS</th>
		<th>Guru</th>
	</tr>
	<?php 
	$number = 0;
	foreach ($nilai as $n): ?>
		<tr>
			<td><?= ++$number; ?></td>
			<td><?= $n['nama_mapel'] ?></td>
			<td><?= $n['nilai_pts'] ?></td>
			<td><?= $n['nilai_pas'] ?></td>
			<td><?= $n['nama_guru'] ?></td>
		</tr>
	<?php endforeach ?>
</table>