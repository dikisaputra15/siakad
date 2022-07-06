<!-- DataTales Example -->
<div class="container mt-3">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title_page; ?></h6>
        </div>
        <div class="card-body">
            
               <form action="<?= base_url('Absensi/proses_absen_siswa'); ?>" method="POST">
				 <table class="table table-bordered table-striped table-hover" id="postsList" width="100%" cellspacing="0">
			      <thead>
			        <tr>
						<th style="max-width: 5%;">No</th>
						<th>Nama Siswa</th>
						<th>Mata Pelajaran</th>
						<th>Guru</th>
						<th>PTS</th>
						<th>PAS</th>
			        </tr>
			      </thead>
			      <tbody>
			      	<?php 
			      		$number = 0;
			      		foreach ($siswa as $g) { ?>
			      		<tr>
			      			<td><?= ++$number; ?></td>
			      			<td><?= $g['nisn']; ?>
			      				<input type="tekt" name="id_siswa[]" value="<?= $g['id_siswa']; ?>" hidden>
			      			</td>
			      			<td><?= $g['nama_siswa']; ?></td>
			      			
			      		</tr>
			      	<?php
			      		}
			      	?>
			      </tbody>
			      </table>
			       <div class="form-group">
				  	<input type="submit" class="btn btn-primary" name="absen" value="Absen">
				  </div>
				</form>
        </div>
    </div>
</div>