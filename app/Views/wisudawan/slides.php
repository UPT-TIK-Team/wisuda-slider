<?= $this->extend('layout/default'); ?>

<?= $this->section('content'); ?>
<?php $totalLength = count($wisudawan) ?>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-pause="false" data-bs-interval="5000">
  <div class="carousel-inner">
    <?php foreach ($wisudawan as $i => $row) : ?>
      <?php if ($i === 0) : ?>
        <div class="carousel-item active">
          <h2 class="npm">Lulusan</h2>
          <h2 class="predikat">Program Studi</h2>
          <h2 class="fakultas"><?= $row['fakultas_saja'] ?></h2>
          <h2 class="fakultas"><?= $row['fakultas'] ?></h2>
        </div>
        <?php break; ?>
      <?php endif; ?>
    <?php endforeach ?>
    <?php foreach ($wisudawan as $i => $row) : ?>
      <?php if ($i === 0) : ?>
        <div class="carousel-item">
          <h1 class="predikat">WISUDAWAN TERBAIK</h1>
          <h1 class="nama"><?= $row['nama'] ?></h1>
          <h2 class="npm"><?= $row['npm'] ?></h2>
          <img src="/img/wisudawan/<?= $row['npm'] ?>.jpg" height="350vh">
          <h2 class="npm"><?= $row['ipk'] ?></h2>
          <h2 class="fakultas"><?= $row['fakultas_saja'] ?></h2>
          <h2 class="predikat"><?= $row['predikat_kelulusan'] ?></h2>
        </div>
        <?php break; ?>
      <?php endif; ?>
    <?php endforeach ?>
    <?php foreach ($wisudawan as $i => $row) : ?>
      <?php if ($i === 0) continue; ?>
      <div class="carousel-item">
        <h1 class="nama"><?= $row['nama'] ?></h1>
        <h2 class="npm"><?= $row['npm'] ?></h2>
        <img src="/img/wisudawan/<?= $row['npm'] ?>.jpg" height="350vh">
        <h2 class="fakultas"><?= $row['fakultas_saja'] ?></h2>
        <h2 class="predikat"><?= $row['predikat_kelulusan'] ?></h2>
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
<script>
  const url = ['s2_ilmu_hukum', 's1_ilmu_hukum', 's2_manajemen', 's1_manajemen', 's1_akuntansi', 'd3_akuntansi', 's1_pendidikan_luar_sekolah', 's1_pendidikan_matematika', 's1_pendidikan_bahasa_inggris', 's1_pendidikan_jasmani_Kesehatan_dan_rekreasi', 's1_pendidikan_bahasa_dan_sastra_indonesia', 's1_agroteknologi', 's1_agribisnis', 's2_pendidikan_agama_islam', 's1_pendidikan_agama_islam', 's1_manajemen_pendidikan_islam', 's1_pendidikan_islam_anak_usia_dini', 's1_teknik_industri', 's1_teknik_mesin', 's1_teknik_elektro', 'd3_teknik_mesin', 's1_teknik_informatika', 's1_ilmu_pemerintahan', 's1_ilmu_komunikasi', 'd3_kebidanan'];
  const baseURL = '<?= base_url() ?>';
  const akhir = <?= $totalLength ?>;
  const carousel = document.querySelectorAll('.carousel-item');
  setInterval(() => {
    carousel.forEach((data, i) => {
      if (data.classList.contains('active') && i == (akhir)) {
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
          window.location.href = targetPath;
        }, 100)
      }
    })
  }, 2000)
</script>
<?= $this->endSection(); ?>