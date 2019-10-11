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
      <img class="program_hero_image" src="program_hero.png">
    </div> -->

    <section class="container my-5">
      <div class="row justify-content-lg-end">
        <div class="col-md-10 col-lg-7 mx-4 mx-lg-5">
          <h1 class="text-lg-right">General Program Details</h1>
          <h2 class="text-lg-right">Length</h2>
          <p class="text-lg-right">
            Our program lasts seven weeks, followed by an end-of-season tournament.
          </p>
          <h2 class="text-lg-right">Sports</h2>
          <p class="text-lg-right">
            Our experience has taught us that soccer is the easiest and most
            cost-effective. We offer soccer packages in the fall and spring,
            but if your organization is interested in other sports, please contact us.
            Your organization needs access to an open, flat, grassy area.
            It does not have to be a regulation-size soccer field.
          </p>
          <h2 class="text-lg-right">Ages</h2>
          <p class="text-lg-right">
            Our program is geared for younger children, ages 3-8. However, if
            your organization has a need for older age groups and can meet our
            program requirements, contact us for more details.
          </p>
        </div>
      </div>
    </section>

    <section class="bg-light-blue py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-lg-7 mx-4 mx-lg-5">
            <h1>What's Included</h1>
            <h2>Director's Package</h2>
            <p>
              The director is primarily responsible for running the
              program with counsel from Breakaway.<br>
              The package includes:
            </p>
            <ul>
              <li>Operations manual</li>
              <li>Sport-specific equipment</li>
              <li>On-site setup from Breakaway</li>
              <li>Ongoing support from Breakaway throughout the season</li>
            </ul>
            <h2>Coach's Package</h2>
            <p>
              Your organization will be responsible for providing coaches
              to help run the league.<br>
              The package includes:
            </p>
            <ul>
              <li>Coach's manual</li>
              <li>On-site training from Breakaway</li>
              <li>Support from director</li>
            </ul>
            <h2>Player's Package</h2>
            <p>
              We provide the equipment that each player needs to
              participate in the program.<br>
              The package includes:
            </p>
            <ul>
              <li>T-Shirt</li>
              <li>Ball</li>
              <li>Playbook/devotional book</li>
              <li>End-of-season award</li>
              <li>In-season incentives</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section class="container">
      <div class="row justify-content-lg-end mt-3">
        <div class="col-lg-4">
          <a href="program_more.php" class="blue font-lg">
            Read More<span class="arrow-right align-middle"></span>
          </a>
        </div>
      </div>
      <div class="row justify-content-center my-5">
        <a href="register.php" class="col-sm-8 col-md-5 col-lg-4 orange font-xl text-center px-5 py-4 mx-2">
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
