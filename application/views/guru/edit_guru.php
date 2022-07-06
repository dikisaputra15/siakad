<!-- DataTales Example -->
<div class="container mt-3">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title_page; ?></h6>
        </div>
        <div class="card-body">
            
               <form action="<?= base_url('Guru/update_guru'); ?>" method="POST">
				  <input type="text" name="id_guru" value="<?= $guru['id_guru']; ?>" class="form-control" hidden>
				  <div class="form-group">
				    <label for="exampleFormControlInput1">NIP</label>
				    <input type="text" name="nip" class="form-control" id="exampleFormControlInput1" value="<?= $guru['nip']; ?>">
				  </div>
				   <div class="form-group">
				    <label for="exampleFormControlInput1">Nama Guru</label>
				    <input type="text" name="nama_guru" class="form-control" id="exampleFormControlInput1" value="<?= $guru['nama_guru']; ?>">
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
				    <select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1">
					    <option <?php if($guru['jenis_kelamin']=='Laki-Laki'){ echo "selected"; } ?> value="Laki-Laki">Laki - Laki</option>
					    <option <?php if($guru['jenis_kelamin']=='Perempuan'){ echo "selected"; } ?> value="Perempuan">Perempuan</option>
				    </select>
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlSelect1">Keterangan</label>
				    <select class="form-control" name="keterangan" id="exampleFormControlSelect1">
					    <option <?php if($guru['keterangan']=='1'){ echo "selected"; } ?> value="1">Aktif</option>
					    <option <?php if($guru['keterangan']=='0'){ echo "selected"; } ?> value="0">Non Aktif</option>
				    </select>
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlInput1">Telepon</label>
				    <input type="text" name="telepon" class="form-control" id="exampleFormControlInput1" value="<?= $guru['telepon']; ?>">
				  </div>
				  <div class="form-group">
				  	<input type="submit" class="btn btn-primary" name="edit" value="Update">
				  </div>
				</form>
            
        </div>
    </div>
</div>