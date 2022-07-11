<?= $this->extend('layout/default'); ?>
<?= $this->section('content'); ?>
<div class="container mt-5">
  <h2>Upload Data Wisudawan</h2>
  <form method="post" action="/upload-excel" enctype="multipart/form-data">
    <div class="form-group">
      <label>Pilih File Excel</label>
      <input type="file" class="form-control" id="file" name='excel-file' required accept=".xls, .xlsx" /></p>
    </div>
    <div class="form-group">
      <button class="btn btn-primary" type="submit">Upload</button>
    </div>
  </form>
</div>
<?= $this->endSection(); ?>