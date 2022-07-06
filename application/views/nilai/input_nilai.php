<!-- DataTales Example -->
<div class="container mt-3">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title_page; ?></h6>
        </div>
        <div class="card-body">
            
               <form action="<?= base_url('Nilai/proses_input_nilai'); ?>" method="POST">
				<table>
					<tr>
						<td>Nama Siswa
						<input type="text" name="id_siswa" value="<?= $siswa['id_siswa']; ?>" hidden>
						</td>
						<td>:</td>
						<td><?= $siswa['nama_siswa']; ?></td>
					</tr>
					<tr>
						<td>Kelas</td>
						<td>:</td>
						<td><?= $siswa['kelas']; ?></td>
					</tr>
				</table>
				 <table class="table table-bordered table-striped table-hover" id="postsList" width="100%" cellspacing="0">
			      <thead>
			        <tr>
						<th style="max-width: 5%;">No</th>
						<th>Mata Pelajaran</th>
						<th>Nilai PTS</th>
						<th>Nilai PAS</th>
						<th>Nama Guru</th>
			        </tr>
			      </thead>
			      <tbody>
			      	<?php 
			      		$number = 0;
			      		foreach ($mapel as $m) { ?>
			      		<tr>
			      			<td><?= ++$number; ?></td>
			      			<td><?= $m['nama_mapel']; ?>
			      				<input type="tekt" name="id_mapel[]" value="<?= $m['id_mapel']; ?>" hidden>
			      			</td>
			      			<td><input type="text" name="nilai_pts[]" class="form-control"></td>
			      			<td><input type="text" name="nilai_pas[]" class="form-control"></td>
			      			<td>
			      				<select class="form-control" name="id_guru[]">
			      				<?php foreach ($guru as $g) {?>
			      					
			      				}
			      					<option value="<?= $g['id_guru']; ?>"><?= $g['nama_guru']; ?></option>
			      				<?php } ?>
			      				</select>
			      			</td>
			      		</tr>
			      	<?php
			      		}
			      	?>
			      </tbody>
			      </table>
			       <div class="form-group">
				  	<input type="submit" class="btn btn-primary" name="input" value="Input">
				  </div>
				</form>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Nilai Siswa</h6>
        </div>
        <div class="card-body">
        <table class="table table-bordered table-striped table-hover" id="postsList" width="100%" cellspacing="0">
			      <thead>
			        <tr>
						<th style="max-width: 5%;">No</th>
						<th>Mata Pelajaran</th>
						<th>Nilai PTS</th>
						<th>Nilai PAS</th>
						<th>Nama Guru</th>
			        </tr>
			      </thead>
			       <tbody>
			       <?php 
			       $number = 0;
			       foreach ($nilai as $n) { ?>
			       	<tr>
			       		<td><?= ++$number; ?></td>
			       		<td><?= $n['nama_mapel']; ?></td>
			       		<td><?= $n['nilai_pts']; ?></td>
			       		<td><?= $n['nilai_pas']; ?></td>
			       		<td><?= $n['nama_guru']; ?></td>
			       	</tr>
			       	<?php } ?>
			       </tbody>
			</table>
        </div>
     </div>
</div>