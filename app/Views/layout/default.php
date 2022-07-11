<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Wisuda Online UNSIKA</title>
  <style>
    html {
      height: 100%;
    }

    body {
      margin: 0;
    }

    .bg {
      animation: slide 3s ease-in-out infinite alternate;
      background-image: linear-gradient(-20deg, red 50%, #000 50%);
      bottom: 0;
      left: -100%;
      opacity: .5;
      position: fixed;
      right: -50%;
      top: 0;
      z-index: -1;
    }

    .bg2 {
      animation-direction: alternate-reverse;
      animation-duration: 4s;
    }

    .bg3 {
      animation-duration: 5s;
    }

    .content {
      background-color: rgba(255, 255, 255, .8);
      border-radius: .25em;
      box-shadow: 0 0 .25em rgba(0, 0, 0, .25);
      box-sizing: border-box;
      left: 50%;
      padding: 10vmin;
      position: fixed;
      text-align: center;
      top: 50%;
      transform: translate(-50%, -50%);
    }

    h1 {
      font-family: monospace;
    }

    @keyframes slide {
      0% {
        transform: translateX(-25%);
      }

      100% {
        transform: translateX(25%);
      }
    }
  </style>
</head>

<body>
  <div class="bg"></div>
  <div class="bg bg2"></div>
  <div class="bg bg3"></div>
  <div class="content">
    <h1>Sliding Diagonals Background Effect</h1>
  </div>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark" style=" background-color: #800000;">
      <div class="container-fluid">
        <a class=" navbar-brand mt-2 mt-lg-0" href="https://unsika.ac.id">
          <img src="<?= base_url('img/unsika-logo.png') ?>" alt="unsika-logo" height="50">
          <h5 class="d-inline align-middle" style="font-size: medium;">Wisuda</h5>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="/wisudawan/upload_excel">Upload Excel</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <div class="col">
      <div class="row">
        <?= $this->renderSection('content'); ?>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>