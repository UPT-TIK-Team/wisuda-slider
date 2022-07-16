<?= $this->extend('layout/default'); ?>

<?= $this->section('content'); ?>
<div class="content">
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
  document.addEventListener(('click'), () => {
    window.location.href = '<?= base_url('/slides/s2_ilmu_hukum') ?>'
  })
</script>
<?= $this->endSection(); ?>