<!-- DataTales Example -->
<div class="container mt-3">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title_page; ?></h6>
        </div>
        <div class="card-body">
            
               <form action="<?= base_url('Absensi/proses_absen'); ?>" method="POST">
				  <input type="text" name="id_guru" value="<?= $checkin['id_guru']; ?>" class="form-control" hidden>
				  <div class="form-group">
				    <label for="exampleFormControlInput1">NIP</label>
				    <input type="text" name="nip" class="form-control" id="exampleFormControlInput1" value="<?= $checkin['nip']; ?>" readonly>
				  </div>
				   <div class="form-group">
				    <label for="exampleFormControlInput1">Nama Guru</label>
				    <input type="text" name="nama_guru" class="form-control" id="exampleFormControlInput1" value="<?= $checkin['nama_guru']; ?>" readonly>
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlSelect1">Keterangan</label><br>
				    <input type="radio" name="keterangan" value="Hadir">Hadir
				    <input type="radio" name="keterangan" value="Sakit">Sakit
				    <input type="radio" name="keterangan" value="Izin">Izin
				    <input type="radio" name="keterangan" value="Tanpa Keterangan">Tanpa Keterangan
				  </div>
				  <div class="form-group">
				  	<input type="submit" class="btn btn-primary" name="checkin" value="Absen">
				  </div>
				</form>
            
        </div>
    </div>
</div>