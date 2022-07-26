<?= $this->extend('layout/default'); ?>

<?= $this->section('content'); ?>
<?php $totalLength = count($wisudawan) ?>
<div id="carouselExampleCaptions" class="carousel slide wisudawan-terbaik" data-bs-ride="carousel" data-bs-pause="false">
  <div class="carousel-inner">
    <?php foreach ($wisudawan as $i => $row) : ?>
      <?php if ($i === 0) : ?>
        <div class="carousel-item active">
          <h1 class="prodi">WISUDAWAN TERBAIK</h1>
          <h2 class="predikat">Universitas Singaperbangsa Karawang</h2>
          <h2 class="fakultas">Tahun Akademik 2021 / 2022</h2>
        </div>
        <?php break; ?>
      <?php endif; ?>
    <?php endforeach ?>
    <?php foreach ($wisudawan as $i => $row) : ?>
      <div class="carousel-item">
        <h1 class="wisudawan">WISUDAWAN TERBAIK</h1>
        <div class="container" style="border-radius: 5%;">
          <div class="row justify-content-center">
            <div class="col-sm-3 my-3 text-center">
              <img src="/img/wisudawan/<?= $row['npm'] ?>.jpg" height="400vh" class="rounded">
            </div>
            <div class="col-sm-7 my-3 text-start">
              <h2 class="nama"><?= $row['nama'] ?></h2>
              <h2 class="fakultas"><?= $row['fakultas'] ?></h2>
              <h2 class="fakultas"><?= $row['fakultas_saja'] ?></h2>
              <h2 class="fakultas"><?= $row['prodi_sk_kelulusan'] ?></h2>
              <h2 class="light"><?= $row['ipk'] ?></h2>
              <?php if ($row['predikat_kelulusan'] === 'Pujian') : ?>
                <h2 class="predikat"><?= $row['predikat_kelulusan'] ?></h2>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <?php if ($i === $totalLength) : ?>
        <span class="btn btn-danger">
          Next
        </span>
      <?php endif; ?>
    <?php endforeach ?>
  </div>
</div>
<div id="carouselButton">
  <span id="play" class="btn btn-danger">
    Play
  </span>
  &nbsp;
  <span id="pause" class="btn btn-danger">
    Pause
  </span>
  &nbsp;
  <span id="next" class="btn btn-danger">
    Next
  </span>
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
<script>
  const baseURL = '<?= base_url() ?>';
  const akhir = <?= $totalLength ?>;
  const carousel = document.querySelectorAll('.carousel-item');
  const nextSlide = () => {
    setTimeout(() => {
      window.location.href = `${baseURL}/slides/s2_ilmu_hukum`;
    }, 100)
  }
  setInterval(() => {
    if (carouselSlide._isPaused === false) {
      carousel.forEach((data, i) => {
        if (data.classList.contains('active') && i === (akhir)) nextSlide()
      })
    }
  }, 3000)
  const myCarousel = document.querySelector('#carouselExampleCaptions')
  const carouselSlide = new bootstrap.Carousel(myCarousel, {
    interval: 5000,
  })
  document.addEventListener('keypress', (e) => {
    if (e.code === 'Space') {
      carouselSlide.pause()
    }
  })
  document.addEventListener('keyup', (e) => {
    if (e.code === 'Space') {
      carouselSlide.cycle()
    }
  })
  document.onkeydown = ((e) => {
    if (e.keyCode == '39') {
      nextSlide()
    }
  })

  document.querySelector('#play').addEventListener('click', () => {
    carouselSlide.cycle()
  })
  document.querySelector('#pause').addEventListener('click', (e) => {
    e.target.setAttribute('data-status', 'true')
    carouselSlide.pause()
  })
  document.querySelector('#next').addEventListener('click', (e) => {
    carouselSlide.pause()
    nextSlide()
  })
</script>
<?= $this->endSection(); ?>