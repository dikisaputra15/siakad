<!-- DataTales Example -->
<div class="container mt-3">
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex justify-content-between">
		  	<h6 class="m-0 font-weight-bold text-primary"><?= $title_page; ?></h6>
		  	
		</div>
		<div class="card-body">
			<div class="table-responsive">
			
			    <table class="table table-bordered table-striped table-hover" id="example" width="100%" cellspacing="0">
			      <thead>
			        <tr>
						<th style="max-width: 5%;">No</th>
						<th>NISN</th>
						<th>Nama Siswa</th>
						<th>Action</th>
			        </tr>
			      </thead>
			      <tbody>
			      			<?php 
			      	$number = 0;
			      	foreach($siswa as $s): ?>
			      	<tr>
			      		<td><?= ++$number; ?></td>
			      		<td><?= $s['nisn']; ?></td>
			      		<td><?= $s['nama_siswa']; ?></td>
			      		<td><a href="<?= base_url('Nilai/input_nilai/') . $s['id_siswa']; ?>" class="btn btn-primary">Input</a></td>
			      	</tr>
				    <?php endforeach; ?>
			      	
			      </tbody>
			    </table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
    $('#example').DataTable();
});
</script>


