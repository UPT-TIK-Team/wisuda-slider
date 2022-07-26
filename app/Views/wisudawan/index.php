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
    window.location.href = '<?= base_url('/wisudawan-terbaik') ?>'
  })
</script>
<?= $this->endSection(); ?>