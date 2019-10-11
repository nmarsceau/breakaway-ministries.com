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
$active_menu_item = 'philo';
require('header.php');
?>

  <main class="flex-fill-space">
    <article class="container">
      <div class="row mb-5">
        <h1 class="col-12">Philosophy of Ministry</h1>
      </div>

      <div class="row">
        <div class="col-md-10 col-lg-7">
          <a id="bible"></a>
          <h2>Bible-believing</h2>

          <p>
            We believe in God’s inerrant, complete Word, and we would never
            add to it or take away from it. The Bible is used in all of our
            instruction and teaching.
          </p>
        </div>
      </div>

      <div class="row justify-content-lg-end">
        <div class="col-md-10 col-lg-7">
          <a id="gospel"></a>
          <h2 class="text-lg-right">Gospel-focused</h2>

          <p class="text-lg-right">
            Breakaway’s primary focus is getting the gospel to children
            and their families. Our playbook is a vital tool to help us accomplish
            that goal. It is designed to initiate interaction/conversations between
            children and their parents and league leaders.
          </p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-10 col-lg-7">
          <a id="community"></a>
          <h2>Community-oriented</h2>

          <p>
            The program is designed to heavily involve group leaders to be
            active in their community. This is accomplished by canvassing,
            recruiting, and training of both players and volunteers.
          </p>
        </div>
      </div>

      <div class="row justify-content-lg-end">
        <div class="col-md-10 col-lg-7">
          <a id="sportsmanship"></a>
          <h2 class="text-lg-right">Competitive Sportsmanship</h2>

          <p class="text-lg-right">
            The league is modeled to instruct the children how to be competitive
            in athletics, win or lose.
          </p>

          <p class="text-lg-right">
            Competition in and of itself is a good thing. In today’s society,
            nothing short of winning is acceptable. Christ’s example teaches us
            that you can be competitive and honor the Lord in victory or defeat.
          </p>
        </div>
      </div>
    </article>
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
