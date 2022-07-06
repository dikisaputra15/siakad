<div class="container mt-3">
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?= $title_page; ?></h6>
    </div>
    <div class="card-body">
    <form action="<?= base_url('Laporan/pdf_nilai_siswa'); ?>" method="POST" target="__blank">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">NISN</label>
          <input type="text" class="form-control" name="nisn" placeholder="Input NISN" required>
        </div>
        
        <div class="form-group col-md-6">
          <br>
          <input type="submit" name="lihat" value="Lihat" class="btn btn-primary">
        </div>
      </div>
    </form>
  </div>
</div>
</div>