<?= $this->extend('layout/default'); ?>
<?= $this->section('content'); ?>
<form method="post" action="/wisudawan/upload_excel" enctype="multipart/form-data">
  <div class="form-group">
    <label>File Excel</label>
    <input type="file" class="form-control" id="file" name='excel-file' required accept=".xls, .xlsx" /></p>
  </div>
  <div class="form-group">
    <button class="btn btn-primary" type="submit">Upload</button>
  </div>
</form>
<?= $this->endSection(); ?>