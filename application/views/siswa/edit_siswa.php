<!-- DataTales Example -->
<div class="container mt-3">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title_page; ?></h6>
        </div>
        <div class="card-body">
            
               <form action="<?= base_url('Siswa/update_siswa'); ?>" method="POST">
				  <input type="text" name="id_siswa" value="<?= $siswa['id_siswa']; ?>" class="form-control" hidden>
				  <div class="form-group">
				    <label for="exampleFormControlInput1">NISN</label>
				    <input type="text" name="nisn" class="form-control" id="exampleFormControlInput1" value="<?= $siswa['nisn']; ?>">
				  </div>
				   <div class="form-group">
				    <label for="exampleFormControlInput1">Nama Siswa</label>
				    <input type="text" name="nama_siswa" class="form-control" id="exampleFormControlInput1" value="<?= $siswa['nama_siswa']; ?>">
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
				    <select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1">
					    <option <?php if($siswa['jenis_kelamin']=='Laki-Laki'){ echo "selected"; } ?> value="Laki-Laki">Laki - Laki</option>
					    <option <?php if($siswa['jenis_kelamin']=='Perempuan'){ echo "selected"; } ?> value="Perempuan">Perempuan</option>
				    </select>
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlInput1">Tempat Tanggal Lahir</label>
				    <input type="date" name="ttl" class="form-control" value="<?= $siswa['ttl']; ?>">
				  </div>
				  
				  <div class="form-group">
				    <label for="exampleFormControlTextarea1">Alamat</label>
				    <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"><?= $siswa['alamat']; ?></textarea>
				  </div>

				   <div class="form-group">
				    <label for="exampleFormControlInput1">Kelas</label>
				    <input type="text" name="kelas" class="form-control" id="exampleFormControlInput1" value="<?= $siswa['kelas']; ?>">
				  </div>

				  <div class="form-group">
				    <label for="exampleFormControlSelect1">Keterangan</label>
				    <select class="form-control" name="keterangan" id="exampleFormControlSelect1">
					    <option <?php if($siswa['keterangan']=='1'){ echo "selected"; } ?> value="1">Aktif</option>
					    <option <?php if($siswa['keterangan']=='0'){ echo "selected"; } ?> value="0">Non Aktif</option>
				    </select>
				  </div>
				  <div class="form-group">
				  	<input type="submit" class="btn btn-primary" name="edit" value="Update">
				  </div>
				</form>
            
        </div>
    </div>
</div>