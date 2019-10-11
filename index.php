<?php require_once('config.php'); ?>

<html>
<head>
  <title>Breakaway Sports Ministries</title>

  <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
  <link rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./style.css">

  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

  <meta name="viewport" content="width=device-width">
</head>

<body>
<div class="page-wrapper">
<?php
$active_menu_item = 'home';
require('header.php');
?>

  <main class="flex-fill-space">
    <section id="homepage-carousel" class="carousel slide container mb-5" data-ride="carousel">
      <div class="row">
        <div class="col">
          <ol class="carousel-indicators">
            <li data-target="#homepage-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#homepage-carousel" data-slide-to="1"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="soccer.png" alt="Children Playing Soccer">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="Fall2019.png" alt="Register for a Breakaway Program">
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-light-blue my-5 py-3">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <h1>Our Mission</h1>
            <h2>Equipping organizations to teach biblically and
            to reach evangelistically through sports</h2>
          </div>
        </div>
      </div>
    </section>

    <section class="container">
      <div class="row my-5">
        <div class="col-md-6 col-lg-3 my-3">
          <a href="philosophy.php#bible">
            <img src="bullet_point_1.png" class="w-100">
            <p class="font-lg text-dark text-center">Bible-believing</p>
          </a>
        </div>
        <div class="col-md-6 col-lg-3 my-3">
          <a href="philosophy.php#gospel">
            <img src="bullet_point_2.png" class="w-100">
            <p class="font-lg text-dark text-center">Gospel-focused</p>
          </a>
        </div>
        <div class="col-md-6 col-lg-3 my-3">
          <a href="philosophy.php#community">
            <img src="bullet_point_3.png" class="w-100">
            <p class="font-lg text-dark text-center">Community-oriented</p>
          </a>
        </div>
        <div class="col-md-6 col-lg-3 my-3">
          <a href="philosophy.php#sportsmanship">
            <img src="bullet_point_4.png" class="w-100">
            <p class="font-lg text-dark text-center">Competitive Sportsmanship</p>
          </a>
        </div>
      </div>
    </section>
  </main>

  <?php require('footer.php'); ?>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <script src="script.js"></script>
</div> <!-- page wrapper -->
</body>
</html>
