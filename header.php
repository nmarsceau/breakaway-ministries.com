<header class="flex-size-auto mb-5">
  <?php
  $menu_items = array('home', 'contact', 'blog', 'prog', 'philo', 'register', 'fall_2019');

  if (!isset($active_menu_item) || !in_array($active_menu_item, $menu_items)) {
    $active_menu_item = 'home';
  }

  ?>

  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg row">
      <a class="navbar-brand col-8 col-md-5 col-lg-3 p-2" href="index.php">
        <img src="logo.png" class="img-fluid">
      </a>
      <button class="navbar-toggler" type="button"
        data-toggle="collapse" data-target="#main-nav"
        aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse col-md-7 col-lg-9 justify-content-end" id="main-nav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link py-3 pb-lg-0 blue <?php echo ($active_menu_item == 'prog') ? 'active' : ''; ?>" href="program.php">
              Program Details<?php if ($active_menu_item == 'prog') { ?><span class="sr-only"> (current)</span><?php } ?>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link py-3 pb-lg-0 blue <?php echo ($active_menu_item == 'philo') ? 'active' : ''; ?>" href="philosophy.php">
              Our Philosophy<?php if ($active_menu_item == 'philo') { ?><span class="sr-only"> (current)</span><?php } ?>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link py-3 pb-lg-0 blue <?php echo ($active_menu_item == 'contact') ? 'active' : ''; ?>" href="contact.php">
              Contact Us<?php if ($active_menu_item == 'contact') { ?><span class="sr-only"> (current)</span><?php } ?>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link py-3 pb-lg-0 orange <?php echo ($active_menu_item == 'fall_2019') ? 'active' : ''; ?>" href="fall_2019.php">
              Fall 2019<?php if ($active_menu_item == 'fall_2019') { ?><span class="sr-only"> (current)</span><?php } ?>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</header>