<div class="container mt-3">
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?= $title_page; ?></h6>
    </div>
    <div class="card-body">
    <form action="<?= base_url('Laporan/pdf_absensi'); ?>" method="POST" target="__blank">
      <div class="form-row">
        <div class="form-group col-md-3">
          <label for="inputEmail4">Tanggal</label>
          <input type="date" class="form-control" name="tgl1" id="inputEmail4" required>
        </div>
        <div class="form-group col-md-3">
        <br>
          <label style="text-align: center;">S/d</label>
        </div>
        <div class="form-group col-md-3">
          <label for="inputPassword4">Tanggal</label>
          <input type="date" class="form-control" name="tgl2" id="inputPassword4" required>
        </div>
        <div class="form-group col-md-3">
          <br>
          <input type="submit" name="lihat" value="Lihat" class="btn btn-primary">
        </div>
      </div>
    </form>
  </div>
</div>
</div>