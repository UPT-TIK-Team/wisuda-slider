<?= $this->extend('layout/default'); ?>

<?= $this->section('content'); ?>
<?php $totalLength = count($wisudawan) ?>
<div id="carouselExampleCaptions" class="carousel slide wisudawan-biasa" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php foreach ($wisudawan as $i => $row) : ?>
      <?php if ($i === 0) : ?>
        <div class="carousel-item active text-start mx-5">
          <h2 class="fw-normal fs-2">Lulusan</h2>
          <h2 class="predikat">Program Studi</h2>
          <h2 class="prodi"><?= $row['prodi_sk_kelulusan'] ?></h2>
          <h2 class="fakultas"><?= $row['fakultas'] ?></h2>
        </div>
        <?php break; ?>
      <?php endif; ?>
    <?php endforeach ?>
    <?php if ($row['prodi_sk_kelulusan'] !== 'D3 Teknik Mesin' && $row['prodi_sk_kelulusan'] !== 'S1 Pendidikan Agama Islam') : ?>
      <?php foreach ($wisudawan as $i => $row) : ?>
        <?php if ($i === 0) : ?>
          <div class="carousel-item">
            <h1 class="wisudawan">WISUDAWAN TERBAIK</h1>
            <div class="container rounded terbaik">
              <div class="row justify-content-center">
                <div class="col-sm-3 my-3 text-center">
                  <img src="/img/wisudawan/<?= $row['npm'] ?>.jpg" height="400vh" class="rounded foto">
                </div>
                <div class="col-sm-7 my-3  text-start">
                  <h2 class="nama"><?= $row['nama'] ?></h2>
                  <h2 class="npm"><?= $row['npm'] ?></h2>
                  <h2 class="fakultas"><?= $row['fakultas'] ?></h2>
                  <h2 class="fakultas"><?= $row['fakultas_saja'] ?></h2>
                  <h2 class="fakultas"><?= $row['prodi_sk_kelulusan'] ?></h2>
                  <h2 class="light"><?= $row['ipk'] ?></h2>
                  <h2 class="predikat"><?= $row['predikat_kelulusan'] ?></h2>
                </div>
              </div>
            </div>
          </div>
          <?php break; ?>
        <?php endif; ?>
      <?php endforeach ?>
    <?php endif; ?>
    <?php foreach ($wisudawan as $i => $row) : ?>
      <?php if ($i === 0  && $row['prodi_sk_kelulusan'] !== 'S1 Pendidikan Agama Islam' && $row['prodi_sk_kelulusan'] !== 'D3 Teknik Mesin') continue; ?>
      <div class="carousel-item">
        <h1 class="nama"><?= $row['nama'] ?></h1>
        <h2 class="npm"><?= $row['npm'] ?></h2>
        <img src="/img/wisudawan/<?= $row['npm'] ?>.jpg" height="300vh" class="rounded foto">
        <h2 class="fakultas"><?= $row['fakultas_saja'] ?></h2>
        <?php if ($row['predikat_kelulusan'] === 'Pujian') : ?>
          <h2 class="predikat"><?= $row['predikat_kelulusan'] ?></h2>
        <?php endif; ?>
      </div>
    <?php endforeach ?>
  </div>
</div>
<div id="carouselButton">
  <span id="play" class="btn btn-danger">
    Play
  </span>
  &nbsp;
  <span id="pause" data-status="false" class="btn btn-danger">
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
  const url = ['s2_ilmu_hukum', 's1_ilmu_hukum', 's2_manajemen', 's1_manajemen', 's1_akuntansi', 'd3_akuntansi', 's1_pendidikan_luar_sekolah', 's1_pendidikan_matematika', 's1_pendidikan_bahasa_inggris', 's1_pendidikan_jasmani_kesehatan_dan_rekreasi', 's1_pendidikan_bahasa_dan_sastra_indonesia', 's1_agroteknologi', 's1_agribisnis', 's2_pendidikan_agama_islam', 's1_pendidikan_agama_islam', 's1_manajemen_pendidikan_islam', 's1_pendidikan_islam_anak_usia_dini', 's1_teknik_industri', 's1_teknik_mesin', 's1_teknik_elektro', 'd3_teknik_mesin', 's1_teknik_informatika', 's1_ilmu_pemerintahan', 's1_ilmu_komunikasi', 'd3_kebidanan'];
  const baseURL = '<?= base_url() ?>';
  const akhir = <?= $totalLength ?>;
  const carousel = document.querySelectorAll('.carousel-item');
  const pauseButton = document.querySelector('#pause');
  const nextSlide = () => {
    const lengthPath = window.location.pathname.split('/').length
    const lastPath = window.location.pathname.split('/')[lengthPath - 1]
    let targetPath;
    url.forEach((data, i) => {
      if (data === lastPath && data === 'd3_kebidanan') {
        targetPath = `${baseURL}/slides/s2_ilmu_hukum`
      } else if (data === lastPath) {
        targetPath = `${baseURL}/slides/${url[i+1]}`
      }
    })
    setTimeout(() => {
      window.location.href = targetPath
    }, 100)
  }
  setInterval(() => {
    if (carouselSlide._isPaused === false) {
      carousel.forEach((data, i) => {
        if (data.classList.contains('active') && i == (akhir)) nextSlide();
      })
    }
  }, 2000)
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