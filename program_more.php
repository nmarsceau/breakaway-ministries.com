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
$active_menu_item = 'prog';
require('header.php');
?>

  <main class="flex-fill-space">
    
    <!--
    <div>
      <img class="program_hero_image" src="program_hero_2.png">
    </div> -->

    <section class="container my-5">
      <div class="row">
        <div class="col-md-10 col-lg-7 mx-4 mx-lg-5">
          <h1>Typical Schedule</h1>
          <h2>Week 1</h2>
          <p>
            The first week of the program is reserved for player registration and tryouts
            and coach&apos;s training. Breakaway will come onsite for this training.
          </p>
          <h2>Weeks 2-7</h2>
          <p>
            During weeks 2 through 7, players will complete a weekly devotional and
            participate in sports practice and a game.
          </p>
          <h2>Week 8</h2>
          <p>
            At the discretion of your organization, week 8 can be for an end-of-season
            tournament or celebration.
          </p>
        </div>
      </div>
    </section>

    <section class="bg-light-blue py-5">
      <div class="container">
        <div class="row justify-content-lg-end">
          <div class="col-md-10 col-lg-7 mx-4 mx-lg-5">
            <h1 class="text-lg-right">Cost</h1>
            <h2 class="text-lg-right">Basic Package&nbsp;&nbsp;<strong style="font-size: 0.8em;">$1,999</strong></h2>
            <p class="text-lg-right">
              Our ideal league model is made up of six teams with six players
              per team, equaling 36 players.
            </p>
            <h2 class="text-lg-right">Custom Package&nbsp;&nbsp<span style="font-size: 0.7em;">(Contact for Details)</span></h2>
            <p class="text-lg-right">
              We can customize your package to accommodate less or more
              players based on your needs. Please contact us for more information.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="container">
      <div class="row mt-3">
        <div class="col">
          <a href="program.php" class="blue font-lg">
            <span class="arrow-left align-middle"></span>Back to Program Details
          </a>
        </div>
      </div>
      <div class="row justify-content-center my-5">
        <a href="register.php" class="col-sm-8 col-md-5 col-lg-4 orange text-center font-xl px-5 py-4 mx-2">
          <em>Register Now!</em>
        </a>
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
