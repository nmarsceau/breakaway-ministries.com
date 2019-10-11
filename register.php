<?php require_once('config.php');

$errors = array(
  'name-required' => false,
  'email-required' => false,
  'phone-required' => false,
  'org-name-required' => false,
  'city-required' => false,
  'state-required' => false,
  'zip-required' => false,
  'zip-invalid' => false,
  'org-size-required' => false,
  'facilities-q-required' => false,
  'no-image' => false,
  'not-image' => false,
  'image-too-big' => false,
  'image-wrong-type' => false,
  'image-server-error' => false,
  'facilities-desc-required' => false,
  'season-required' => false,
  'num-players-required' => false,
  'num-volunteers-required' => false
);

function anyErrors(&$errors) {
  return count(array_filter($errors)) ? true : false;
}

$org_size_options = ['Less than 200', '200-500', 'More than 500'];
$season_options = ['Fall', 'Winter', 'Spring', 'Summer'];
$num_players_options = ['Less than 36', '36-72', 'More than 72'];
$num_vols_options = ['8', '8-10', '10-12', '12-15', 'More than 15'];

if (isset($_POST['submit'])) {
  if (!isset($_POST['name']) || $_POST['name'] === '') {
    $errors['name-required'] = true;
  }
  if (!isset($_POST['email']) || $_POST['email'] === '') {
    $errors['email-required'] = true;
  }
  if (!isset($_POST['phone']) || $_POST['phone'] === '') {
    $errors['phone-required'] = true;
  }
  if (!isset($_POST['org-name']) || $_POST['org-name'] === '') {
    $errors['org-name-required'] = true;
  }
  if (!isset($_POST['city']) || $_POST['city'] === '') {
    $errors['city-required'] = true;
  }
  if (!isset($_POST['state']) || $_POST['state'] === '') {
    $errors['state-required'] = true;
  }
  if (isset($_POST['zip'])) {
    if ($_POST['zip'] === '') {
      $errors['zip-required'] = true;
    }
    elseif (!is_numeric($_POST['zip'])) {
      $errors['zip-invalid'] = true;
    }
  }
  else {
    $errors['zip-required'] = true;
  }
  if (!isset($_POST['org-size']) || !in_array($_POST['org-size'], $org_size_options, true)) {
    $errors['org-size-required'] = true;
  }
  if (isset($_POST['facilities-q'])) {
    if ($_POST['facilities-q'] === '') {
      $errors['facilities-q-required'] = true;
    }
    elseif (!in_array($_POST['facilities-q'], ['No', 'Yes'])) {
      $errors['facilities-q-required'] = true;
    }
  }
  else {
    $errors['facilities-q-required'] = true;
  }
  if ($_POST['facilities-q'] === 'Yes') {
    $imageFileType = strtolower(pathinfo($_FILES['facilities-image']['name'], PATHINFO_EXTENSION));
    if ($_FILES['facilities-image']['size'] === 0) {
      $errors['no-image'] = true;
    }
    elseif (getimagesize($_FILES['facilities-image']['tmp_name']) === false) {
      $errors['not-image'] = true;
    }
    elseif ($_FILES['facilities-image']['size'] > 3000000) {
      $errors['image-too-big'] = true;
    }
    elseif (!in_array($imageFileType, ['jpg', 'jpeg', 'gif', 'png'])) {
      $errors['image-wrong-type'] = true;
    }
    else {
      $target_dir = "xRhsiUbwQ9G2n/";
      $target_file = $target_dir . uniqid() . '_' . basename($_FILES['facilities-image']['name']);
      if (!move_uploaded_file($_FILES['facilities-image']['tmp_name'], $target_file)) {
        $errors['image-server-error'] = true;
      }
    }
    if (!isset($_POST['facilities-desc']) || $_POST['facilities-desc'] === '') {
      $errors['facilities-desc-required'] = true;
    }
  }
  if (!isset($_POST['season']) || !in_array($_POST['season'], $season_options, true)) {
    $errors['season-required'] = true;
  }
  if (!isset($_POST['num-players']) || !in_array($_POST['num-players'], $num_players_options, true)) {
    $errors['num-players-required'] = true;
  }
  if (!isset($_POST['num-volunteers']) || !in_array($_POST['num-volunteers'], $num_vols_options, true)) {
    $errors['num-volunteers-required'] = true;
  }

  if (anyErrors($errors)) {
    $data = $_POST;
  }
  else {
    $msg = "New League Registration\n\n";
    $msg .= "Submitted by: " . $_POST['name'] . "\n";
    $msg .= "Phone: " . $_POST['phone'] . "\n";
    $msg .= "Email: " . $_POST['email'] . "\n\n";

    $msg .= "Organization name: " . $_POST['org-name'] . "\n";
    $msg .= "Location: " . $_POST['city'] . ', ' . $_POST['state'] . ' ' . $_POST['zip'] . "\n";
    $msg .= "Size: " . $_POST['org-size'] . "\n\n";

    $msg .= "Do they have the facilities to run the program? " . $_POST['facilities-q'] . "\n";
    if ($_POST['facilities-q'] === 'Yes') {
      $file_url_parts = array_merge([
        $_SERVER['REQUEST_SCHEME'] . ':/',
        $_SERVER['SERVER_NAME']
      ], array_filter(explode('/', $_SERVER['REQUEST_URI'])));
      array_pop($file_url_parts);
      array_push($file_url_parts, $target_file);
      $msg .= "Image: " . implode('/', $file_url_parts) . "\n";
      $msg .= "Description: " . $_POST['facilities-desc'] . "\n\n";
    }
    else {
      $msg .= "\n";
    }

    $msg .= "Desired time of year: " . $_POST['season'] . "\n";
    $msg .= "Number of players: " . $_POST['num-players'] . "\n";
    $msg .= "Number of volunteers: " . $_POST['num-volunteers'] . "\n\n";

    if (isset($_POST['comment']) && $_POST['comment'] !== '') {
      $msg .= "Comments: " . $_POST['comment'] . "\n";
    }

    $headers = "From: donotreply@breakaway-ministries.com";
    mail($conf['email-address'], "Breakaway - New League Registration", $msg, $headers);

    header('Location: register.php?form_success');
    exit();
  }
}
else {
  $data = [
    'name' => '',
    'email' => '',
    'phone' => '',
    'org-name' => '',
    'city' => '',
    'state' => '',
    'zip' => '',
    'org-size' => '',
    'facilities-q' => '',
    'facilities-desc' => '',
    'season' => 'Fall',
    'num-players' => '',
    'num-volunteers' => '',
    'comment' => ''
  ];
}

?>

<html>
<head>
  <title>Register | Breakaway Sport Ministries</title>

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
$active_menu_item = 'register';
require('header.php');
?>

  <div class="flex-fill-space">
    <div class="container">
      <?php if (isset($_GET['form_success'])) { ?>
        <div class="alert alert-success text-center">
          <p class="mb-0">
            <strong>Success!</strong> You've submitted your registration. We'll contact you soon.
          </p>
        </div>
      <?php } ?>
      <?php if (anyErrors($errors)) { ?>
        <div class="alert alert-danger text-center">
          <p class="mb-0">
            We&apos;re sorry! There was a problem submitting your registration.
            <strong>Please fix the errors below</strong>
          </p>
        </div>
      <?php } ?>
      <div class="row mb-5">
        <h1 class="col-12 mb-3">Register</h1>
        <p class="col-lg-9">
          Interested in hosting a Breakaway Sports program? We would love to
          hear from you! We think our program is a perfect fit for homeschool
          groups, church youth programs, or other community groups.
          Please fill out the form below to request contact from our team.
        </p>
      </div>
      <form action="register.php" method="post" enctype="multipart/form-data">
        <fieldset class="form-group py-3"> <!-- person -->
          <div class="row">
            <h3 class="col-12">Direct Contact</h3>
          </div>
          <div class="row">
            <div class="col-md-8 col-lg-6">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" value="<?= $data['name'] ?>"
                class="<?= $errors['name-required'] ? 'is-invalid' : '' ?> form-control">
              <?php if ($errors['name-required']) { ?>
                <em class="text-danger">Please enter your name</em>
              <?php } ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-4 mt-3">
              <label for="email">Email</label>
              <input type="text" name="email" id="email" value="<?= $data['email'] ?>"
                class="<?= $errors['email-required'] ? 'is-invalid' : '' ?> form-control">
              <?php if ($errors['email-required']) { ?>
                <em class="text-danger">Please enter your email address</em>
              <?php } ?>
            </div>
            <div class="col-md-4 col-lg-3 mt-3">
              <label for="phone">Phone Number</label>
              <input type="text" name="phone" id="phone" value="<?= $data['phone'] ?>"
                class="<?= $errors['phone-required'] ? 'is-invalid' : '' ?> form-control">
              <?php if ($errors['phone-required']) { ?>
                <em class="text-danger">Please enter your phone number</em>
              <?php } ?>
            </div>
          </div>
        </fieldset> <!-- /person -->
        <fieldset class="form-group py-3"> <!-- org -->
          <div class="row">
            <h3 class="col-12">Organization Details</h3>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-5">
              <label for="org-name">Organization Name</label>
              <input type="text" name="org-name" id="org-name" value="<?= $data['org-name'] ?>"
                class="<?= $errors['org-name-required'] ? 'is-invalid' : '' ?> form-control">
              <?php if ($errors['org-name-required']) { ?>
                <em class="text-danger">Please enter your organization name</em>
              <?php } ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 col-lg-3 mt-3">
              <label for="city">City</label>
              <input type="text" name="city" id="city" value="<?= $data['city'] ?>"
                class="<?= $errors['city-required'] ? 'is-invalid' : '' ?> form-control">
              <?php if ($errors['city-required']) { ?>
                <em class="text-danger">Please enter your organization's city</em>
              <?php } ?>
            </div>
            <div class="col-md-2 mt-3">
              <label for="state">State</label>
              <input type="text" name="state" id="state" value="<?= $data['state'] ?>"
                class="<?= $errors['state-required'] ? 'is-invalid' : '' ?> form-control">
              <?php if ($errors['state-required']) { ?>
                <em class="text-danger">Please enter your organization's state</em>
              <?php } ?>
            </div>
            <div class="col-md-2 mt-3">
              <label for="zip">Zip Code</label>
              <input type="text" name="zip" id="zip" value="<?= $data['zip'] ?>"
                class="<?= $errors['zip-required'] || $errors['zip-invalid'] ? 'is-invalid' : '' ?> form-control">
              <?php if ($errors['zip-required']) { ?>
                <em class="text-danger">Please enter your organization's zip code</em>
              <?php } ?>
              <?php if ($errors['zip-invalid']) { ?>
                <em class="text-danger">Please enter a valid zip code</em>
              <?php } ?>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-auto">
              <label for="org-size">
                Approximately what is your organization&apos;s size?
              </label>
            </div>
            <div class="col-md-4">
              <select name="org-size" id="org-size"
                  class="<?= $errors['org-size-required'] ? 'is-invalid' : '' ?> form-control">
                <option value="">-</option>
                <?php foreach ($org_size_options as $org_size) { ?>
                  <option value="<?= $org_size ?>"
                    <?= $data['org-size'] === $org_size ? 'selected' : '' ?>>
                    <?= $org_size ?>    
                  </option>
                <?php } ?>
              </select>
              <?php if ($errors['org-size-required']) { ?>
                <em class="text-danger">Please enter your organization size</em>
              <?php } ?>
            </div>
          </div>
        </fieldset> <!-- /org -->
        <fieldset class="form-group py-3"> <!-- facilities -->
          <div class="row">
            <h3 class="col-12">Facility Details</h3>
          </div>
          <div class="row">
            <div class="col-md-5 col-lg-4">
              <label>
                Does your organization have the facilities to run the program?
              </label>
            </div>
            <div class="col-md-4">
              <div class="form-check form-check-inline">
                <input type="radio" name="facilities-q" id="facilities-q-y"
                  value="Yes" <?= $data['facilities-q'] === 'Yes' ? 'checked' : '' ?>
                  class="<?= $errors['facilities-q-required'] ? 'is-invalid' : '' ?> form-check-input">
                <label for="facilities-q-y" class="form-check-label">Yes</label>
              </div>
              <div class="form-check form-check-inline">
                <input type="radio" name="facilities-q" id="facilities-q-n"
                  value="No" <?= $data['facilities-q'] === 'No' ? 'checked' : '' ?>
                  class="<?= $errors['facilities-q-required'] ? 'is-invalid' : '' ?> form-check-input">
                <label for="facilities-q-n" class="form-check-label">No</label>
              </div>
              <?php if ($errors['facilities-q-required']) { ?>
                <em class="text-danger">Please select an answer</em>
              <?php } ?>
            </div>
          </div>
          <div id="facilities_details" style="display: none;">
            <div class="row mt-3">
              <div class="col-sm-6 col-md-5 col-lg-4">
                <label for="facilities-image">
                  Please upload a photo of your facilities
                </label>
              </div>
              <div class="col-sm-6 col-md-5">
                <input type="file" name="facilities-image" id="facilities-image"
                  class="<?= $errors['no-image'] || $errors['not-image']
                  || $errors['image-too-big'] || $errors['image-wrong-type']
                  || $errors['image-server-error'] ? 'is-invalid' : '' ?> form-control-file">
                <?php if ($errors['no-image']) { ?>
                  <em class="text-danger">Please upload an image</em>
                <?php } ?>
                <?php if ($errors['not-image']) { ?>
                  <em class="text-danger">The file you selected is not an image</em>
                <?php } ?>
                <?php if ($errors['image-too-big']) { ?>
                  <em class="text-danger">Maximum file size is 3MB</em>
                <?php } ?>
                <?php if ($errors['image-wrong-type']) { ?>
                  <em class="text-danger">Only JPG, JPEG, PNG, and GIF files are accepted</em>
                <?php } ?>
                <?php if ($errors['image-server-error']) { ?>
                  <em class="text-danger">We had a problem uploading that image</em>
                <?php } ?>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-5 col-lg-4">
                <label for="facilities-desc">
                  Please estimate the length and width of pictured facilities
                </label>
              </div>
              <div class="col-md-5">
                <textarea name="facilities-desc" id="facilities-desc" rows="2"
                  class="<?= $errors['facilities-desc-required'] ? 'is-invalid' : '' ?> form-control"><?= $data['facilities-desc'] ?></textarea>
                <?php if ($errors['facilities-desc-required']) { ?>
                  <em class="text-danger">Please enter your estimate</em>
                <?php } ?>
              </div>
            </div>
          </div>
        </fieldset> <!-- /facilities -->
        <fieldset class="form-group py-3"> <!-- program details -->
          <div class="row">
            <h3 class="col-12">Program Details</h3>
          </div>
          <div class="row">
            <div class="col-md-5 col-lg-4">
              <label for="season">
                When do you want to do the program?
              </label>
            </div>
            <div class="col-md-4">
              <select name="season" id="season"
                  class="<?= $errors['season-required'] ? 'is-invalid' : '' ?> form-control">
                <?php foreach ($season_options as $season) { ?>
                  <option value="<?= $season ?>"
                    <?= $data['season'] === $season ? 'selected' : '' ?>>
                    <?= $season ?>
                  </option>
                <?php } ?>
              </select>
              <?php if ($errors['season-required']) { ?>
                <em class="text-danger">Please select an option</em>
              <?php } ?>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-5 col-lg-4">
              <label for="num-players">
                Please provide a realistic estimate of the number of players
                in your program
              </label>
            </div>
            <div class="col-md-4">
              <select name="num-players" id="num-players"
                  class="<?= $errors['num-players-required'] ? 'is-invalid' : '' ?> form-control">
                <option value="">-</option>
                <?php foreach ($num_players_options as $num_players) { ?>
                  <option value="<?= $num_players ?>"
                    <?= $data['num-players'] === $num_players? 'selected' : '' ?>>
                    <?= $num_players ?>
                  </option>
                <?php } ?>
              </select>
              <?php if ($errors['num-players-required']) { ?>
                <em class="text-danger">Please select an option</em>
              <?php } ?>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-5 col-lg-4">
              <label for="num-volunteers">
                Please provide a realistic estimate of the number of
                volunteers you will have
                <p id="num-vols-phrase">
                  <strong>(We recommend <span id="num-vols"></span>)</strong>
                </p>
              </label>
            </div>
            <div class="col-md-4">
              <select name="num-volunteers" id="num-volunteers"
                  class="<?= $errors['num-volunteers-required'] ? 'is-invalid' : '' ?> form-control">
                <option value="">-</option>
                <?php foreach ($num_vols_options as $num_vols) { ?>
                  <option value="<?= $num_vols ?>"
                    <?= $data['num-volunteers'] === $num_vols ? 'selected' : '' ?>>
                    <?= $num_vols ?>
                  </option>
                <?php } ?>
              </select>
              <?php if ($errors['num-volunteers-required']) { ?>
                <em class="text-danger">Please select an option</em>
              <?php } ?>
            </div>
          </div>
        </fieldset> <!-- /program details -->
        <fieldset class="form-group pt-3"> <!-- comments -->
          <div class="row">
            <div class="col-lg-8">
              <h3>Comments</h3>
              <textarea rows="4" name="comment" id="comment" class="form-control"
              ><?= $data['comment'] ?></textarea>
            </div>
          </div>
        </fieldset> <!-- /comments -->
        <div class="row mt-4 mb-5">
          <div class="col-md-8 col-lg-5">
            <input type="submit" name="submit" id="submit"
              value="Register My Organization"
              class="btn btn-lg px-5"
              style="background-color: #f66733; color: white;">
          </div>
        </div>
      </form>
    </div>
  </div>

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
  <script>
    var num_players_num_vols = {
      "Less than 36": "at least 8",
      "36-72": "10-15",
      "More than 72": "15 or more"
    };

    var onFacilitiesQuestionChange = function() {
      if ($("#facilities-q-y")[0].checked) {
        $("#facilities_details").slideDown();
      }
      else {
        $("#facilities_details").slideUp();
      }
    }

    var onNumPlayersChange = function() {
      var num_players = $("#num-players").val();
      if (num_players === "") {
        $("#num-vols-phrase").hide();
      }
      else {
        $("#num-vols").text(num_players_num_vols[num_players]);
        $("#num-vols-phrase").show();
      }
    }

    $(function() {
      $("#facilities-q-y").change(onFacilitiesQuestionChange);
      $("#facilities-q-n").change(onFacilitiesQuestionChange);
      onFacilitiesQuestionChange();

      $("#num-players").change(onNumPlayersChange);
      onNumPlayersChange();
    });
  </script>
</div> <!-- page wrapper -->
</body>
</html>
