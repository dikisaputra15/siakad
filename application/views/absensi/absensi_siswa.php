<!-- DataTales Example -->
<div class="container mt-3">
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex justify-content-between">
		  	<h6 class="m-0 font-weight-bold text-primary"><?= $title_page; ?></h6>
		  	
		</div>
		<div class="card-body">
			<div class="table-responsive">
			<a href="<?= base_url('Absensi/form_absen_siswa'); ?>" class="btn btn-primary">Form Absensi</a><br><br>
			    <table class="table table-bordered table-striped table-hover" id="postsList" width="100%" cellspacing="0">
			      <thead>
			        <tr>
						<th style="max-width: 5%;">No</th>
						<th>NISN</th>
						<th>Nama Siswa</th>
						<th>Status</th>
			        </tr>
			      </thead>
			      <tbody>
			      			
			      	<?php 
			      	$number = 0;
			      	foreach($cek as $s): ?>
			      	<tr>
			      		<td><?= ++$number; ?></td>
			      		<td><?= $s['nisn']; ?></td>
			      		<td><?= $s['nama_siswa']; ?></td>
			      		<td>
			      			<?php 
			      				if($s['status']==1){?>
			      				<h7>sudah absen</h7>
			      			<?php }else{ ?>
			      				<h7>belum absen</h7>
			      			<?php } ?>
			      		</td>
			      	</tr>
				    <?php endforeach; ?>
			      </tbody>
			    </table>
			</div>
		</div>
	</div>
</div>



