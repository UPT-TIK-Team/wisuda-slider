<?= $this->extend('layout/default'); ?>

<?= $this->section('content'); ?>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-pause="false" data-bs-interval="2000">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <h1>Lulusan</h1>
      <h2>Program Studi</h2>
      <h2>Teknik Informatika</h2>
    </div>
    <?php foreach ($wisudawan as $i => $row) : ?>
      <div class="carousel-item">
        <h1><?= $row['npm'] ?></h1>
        <h2><?= $row['nama'] ?></h2>
      </div>
    <?php endforeach ?>
  </div>
</div>
<ul class="circles">
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
</ul>
<?= $this->endSection(); ?>