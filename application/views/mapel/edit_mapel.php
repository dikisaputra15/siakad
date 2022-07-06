<!-- DataTales Example -->
<div class="container mt-3">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title_page; ?></h6>
        </div>
        <div class="card-body">
            
               <form action="<?= base_url('Mapel/update_mapel'); ?>" method="POST">
				  <input type="text" name="id_mapel" value="<?= $mapel['id_mapel']; ?>" class="form-control" hidden>
				  <div class="form-group">
				    <label for="exampleFormControlInput1">Nama Mapel</label>
				    <input type="text" name="nama_mapel" class="form-control" id="exampleFormControlInput1" value="<?= $mapel['nama_mapel']; ?>">
				  </div>
				  <div class="form-group">
				  	<input type="submit" class="btn btn-primary" name="edit" value="Update">
				  </div>
				</form>
            
        </div>
    </div>
</div>