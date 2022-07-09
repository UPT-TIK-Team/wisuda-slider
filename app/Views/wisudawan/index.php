<?= $this->extend('layout/default'); ?>

<?= $this->section('content'); ?>
<div id="carouselExampleCaptions" class="carousel slide mt-2 d-flex justify-content-center" data-bs-ride="carousel" data-bs-pause="false" data-bs-interval="1000">
  <div class="carousel-inner" style="width: 50rem;">
    <?php foreach ($wisudawan as $i => $row) : ?>
      <?php if ($i == 0) : ?>
        <div class="carousel-item active">
          <img src="img/background.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5><?= $row['npm'] ?></h5>
            <p><?= $row['nama'] ?></p>
          </div>
        </div>
      <?php else : ?>
        <div class="carousel-item">
          <img src="img/background.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5><?= $row['npm'] ?></h5>
            <p><?= $row['nama'] ?></p>
          </div>
        </div>
      <?php endif ?>
    <?php endforeach ?>
  </div>

</div>
<?= $this->endSection(); ?>