<?php require_once('config.php');

$months = array(
  'January', 'February', 'March', 'April',
  'May', 'June', 'July', 'August',
  'September', 'October', 'November', 'December'
);
$shirt_sizes = [ 'Youth Extra Small', 'Youth Small', 'Youth Medium', 'Youth Large' ];

$errors = [
  'child-name' => false,
  'child-birth-month' => false,
  'child-birth-day' => false,
  'shirt-size' => false,
  'parent-name-first' => false,
  'parent-name-last' => false,
  'parent-email' => false,
  'emergency-phone' => false,
  'addr-line-1' => false,
  'addr-city' => false,
  'addr-state' => false,
  'addr-zip' => false
];

function anyErrors(&$errors) {
  return count(array_filter($errors)) ? true : false;
}

if (isset($_POST['submit'])) {
  if (!isset($_POST['child-name']) || $_POST['child-name'] === '') {
    $errors['child-name'] = true;
  }
  if (!isset($_POST['child-birth-month']) || !in_array($_POST['child-birth-month'], $months)) {
    $errors['child-birth-month'] = true;
  }
  if (isset($_POST['child-birth-day'])) {
    if (!is_numeric($_POST['child-birth-day'])) {
      $errors['child-birth-day'] = true;
    }
    else if (intval($_POST['child-birth-day']) < 1 || intval($_POST['child-birth-day']) > 31) {
      $errors['child-birth-day'] = true;
    }
  }
  else {
    $errors['child-birth-day'] = true;
  }
  if (!isset($_POST['shirt-size']) || !in_array($_POST['shirt-size'], $shirt_sizes)) {
    $errors['shirt-size'] = true;
  }
  if (!isset($_POST['parent-first-1']) || $_POST['parent-first-1'] == '') {
    $errors['parent-name-first'] = true;
  }
  if (!isset($_POST['parent-last-1']) || $_POST['parent-last-1'] == '') {
    $errors['parent-name-last'] = true;
  }
  if (!isset($_POST['parent-email']) || $_POST['parent-email'] == '') {
    $errors['parent-email'] = true;
  }
  if (!isset($_POST['emergency-phone']) || $_POST['emergency-phone'] == '') {
    $errors['emergency-phone'] = true;
  }
  if (!isset($_POST['addr-line-1']) || $_POST['addr-line-1'] == '') {
    $errors['addr-line-1'] = true;
  }
  if (!isset($_POST['addr-city']) || $_POST['addr-city'] == '') {
    $errors['addr-city'] = true;
  }
  if (!isset($_POST['addr-state']) || $_POST['addr-state'] == '') {
    $errors['addr-state'] = true;
  }
  if (!isset($_POST['addr-zip']) || $_POST['addr-zip'] == '') {
    $errors['addr-zip'] = true;
  }

  if (anyErrors($errors)) {
    $data = $_POST;
  }
  else {
    $msg = "New League Registration - Fall 2019\n\n";
    $msg .= "Child's name: " . $_POST['child-name'] . "\n";
    $msg .= "Birthday: " . $_POST['child-birth-month'] . ' ' . $_POST['child-birth-day'] . "\n";
    $msg .= "Shirt size: " . $_POST['shirt-size'] . "\n\n";
    $msg .= "Parent 1 name: " . $_POST['parent-first-1'] . ' ' . $_POST['parent-last-1'] . "\n";
    $msg .= "Parent 2 name: " . $_POST['parent-first-2'] . ' ' . $_POST['parent-last-2'] . "\n";
    $msg .= "Email: " . $_POST['parent-email'] . "\n";
    $msg .= "Emergency Phone: " . $_POST['emergency-phone'] . "\n";
    $msg .= "Address:\n";
    $msg .= $_POST['addr-line-1'] . "\n";
    if (isset($_POST['addr-line-2']) && $_POST['addr-line-2'] != '') {
      $msg .= $_POST['addr-line-2'] . "\n";
    }
    $msg .= $_POST['addr-city'] . ', ' . $_POST['addr-state'] . ' ' . $_POST['addr-zip'];

    $headers = "From: donotreply@breakaway-ministries.com";
    mail($conf['email-address'], "Breakaway - New Fall 2019 Registration", $msg, $headers);

    header('Location: fall_2019.php?form_success');
    exit();
  }
}
else {
  $data = [
    'child-name' => '',
    'child-birth-month' => '',
    'child-birth-day' => '',
    'shirt-size' => '',
    'parent-first-1' => '',
    'parent-last-1' => '',
    'parent-first-2' => '',
    'parent-last-2' => '',
    'parent-email' => '',
    'emergency-phone' => '',
    'addr-line-1' => '',
    'addr-line-2' => '',
    'addr-city' => '',
    'addr-state' => '',
    'addr-zip' => ''
  ];
}

?>

<!doctype html>
<html>
<head>
  <title>Fall 2019 | Breakaway Sports Ministries</title>

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
$active_menu_item = 'fall_2019';
require('header.php');
?>

  <div class="flex-fill-space">
    <form action="fall_2019.php" method="post">
      <div class="container">
        <?php if (isset($_GET['form_success'])) { ?>
          <div class="alert alert-success text-center">
            <p class="mb-0">
              <strong>Success!</strong> You've submitted your registration. We'll contact you soon.
            </p>
          </div>
        <?php } ?>
        
        <div class="row mt-4 mb-5">
          <div class="col-12">
            <h1>Fall 2019</h1>
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-12">
            <h2>8-Week Soccer League</h2>
            <p>
              This fall, Breakaway Sports Ministries is hosting an eight-week
              soccer league for children ages 3 - 8.
              The program consists of seven weeks of league play and an
              end-of-season tournament. During league
              play, each team will have one practice per week and one
              game on Saturday. Your child will receive
              a playbook, soccer ball, and shirt.
            </p>
            <p>
              Each week, your child will complete a 5-day devotional playbook.
              Your child&apos;s coach will also give a challenge
              at the end of practice each week.
            </p>
            <p>
              Participation in the league costs $60. Please <a href="#register-form">register</a>
              using the form below. Payment will be collected on registration day.
              If you have any questions, please
              <a href="mailto:breakawaysportsllc@gmail.com">email Tim Schuyler</a>.
            </p>
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-12">
            <h2>When?</h2>
            <p>
              Registration will be <time datetime="2018-08-29">August 29th</time>.
              Come out to our event, and your child will have a chance to try out
              for the soccer league.
            </p>
            <p>
              The first practice will be <time datetime="2018-09-05">September
              5th</time>, and the first game will be <time datetime="2018-09-07">
              September 7th</time>. The season will end with a tournament on
              <time datetime="2018-10-26">October 26th</time>.
            </p>
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-12">
            <h2>Where?</h2>
            <div class="row">
              <div class="col-lg-4">
                <p>
                  The league will meet on Faith Baptist Church&apos;s ball field. Come to
                  Frontline Drive to park.
                </p>
              </div>
              <div class="col-lg-8">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3368.247654119717!2d-82.35160874092207!3d34.89741074584967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88582dcd8ad782b9%3A0x37bfea5a7b6d9ad5!2sFrontline+Dr%2C+Taylors%2C+SC+29687!5e0!3m2!1sen!2sus!4v1565740109886!5m2!1sen!2sus" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>

        <div class="py-5"></div>
      
        <a id="register-form"></a>

        <?php if (anyErrors($errors)) { ?>
          <div class="alert alert-danger text-center">
            <p class="mb-0">
              Please fill out all the required fields below
            </p>
          </div>
        <?php } ?>

        <div class="row mb-4">
          <h2 class="col-12">Register</h2>
        </div>

        <div class="row">
          <h3 class="col-12">Child&apos;s Information</h3>
        </div>
        <div class="row mb-3">
          <div class="col-md-6 col-lg-4">
            <label for="child-name" class="required">Name</label>
            <input type="text"
              name="child-name" id="child-name" maxlength="<?php echo $child_name_max_length; ?>"
              class="<?= $errors['child-name'] ? 'is-invalid' : '' ?> form-control"
              value="<?= $data['child-name'] ?>">
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <label class="required">Birthday</label>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-sm-6 col-md-3">
            <label for="child-birth-month"><small>Month</small></label>
            <select name="child-birth-month" id="child-birth-month"
              class="<?= $errors['child-birth-month'] ? 'is-invalid' : '' ?> form-control">
              <option value="">-</option>
              <?php foreach($months as $month) { ?>
                <option <?= $data['child-birth-month'] === $month ? 'selected' : '' ?>
                  value="<?= $month ?>"><?= $month ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="col-sm-4 col-md-2">
            <label for="child-birth-day"><small>Day</small></label>
            <select name="child-birth-day" id="child-birth-day"
              class="<?= $errors['child-birth-day'] ? 'is-invalid' : '' ?> form-control">
              <option value="">-</option>
              <?php for ($i = 1; $i <= 29; $i++) { ?>
                <option <?= $data['child-birth-day'] === strval($i) ? 'selected' : '' ?>
                  value="<?= $i ?>"><?= $i ?></option>
              <?php } ?>
              <option
                <?= $data['child-birth-day'] === '30' ? 'selected' : '' ?>
                value="30" id="birth-day-30">30</option>
              <option
                <?= $data['child-birth-day'] === '31' ? 'selected' : '' ?>
                value="31" id="birth-day-31">31</option>
            </select>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-sm-6 col-md-3">
            <label for="shirt-size" class="required">Shirt Size</label>
            <select name="shirt-size" id="shirt-size"
              class="<?= $errors['shirt-size'] ? 'is-invalid' : '' ?> form-control">
              <option value="">-</option>
              <?php foreach ($shirt_sizes as $size) { ?>
                <option <?= $data['shirt-size'] === $size ? 'selected' : '' ?>
                  value="<?= $size ?>"><?= $size ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="row">
          <h3 class="col-12">Parent&apos;s Information</h3>
        </div>
        <div class="row">
          <div class="col-12">
            <label>Name(s)</label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-lg-3">
            <label for="parent-first-1" class="required"><small>First</small></label>
            <input type="text"
              class="<?= $errors['parent-name-first'] ? 'is-invalid' : '' ?> form-control"
              name="parent-first-1" id="parent-first-1"
              value="<?= $data['parent-first-1'] ?>">
          </div>
          <div class="col-md-4 col-lg-3">
            <label for="parent-last-1" class="required"><small>Last</small></label>
            <input type="text"
              class="<?= $errors['parent-name-last'] ? 'is-invalid' : '' ?> form-control"
              name="parent-last-1" id="parent-last-1"
              value="<?= $data['parent-last-1'] ?>">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-4 col-lg-3">
            <label for="parent-first-2" class="not-required"><small>First</small></label>
            <input type="text"
              name="parent-first-2" id="parent-first-2" class="form-control"
              value="<?= $data['parent-first-2'] ?>">
          </div>
          <div class="col-md-4 col-lg-3">
            <label for="parent-last-2" class="not-required"><small>Last</small></label>
            <input type="text"
              name="parent-last-2" id="parent-last-2" class="form-control"
              value="<?= $data['parent-last-2'] ?>">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6 col-lg-5">
            <label for="parent-email" class="required">Email Address</label>
            <input type="text"
              class="<?= $errors['parent-email'] ? 'is-invalid' : '' ?> form-control"
              name="parent-email" id="parent-email"
              value="<?= $data['parent-email'] ?>">
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <label for="emergency-phone" class="required">Emergency Contact Phone Number</label>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-4 col-lg-3">
            <input type="text"
              class="<?= $errors['emergency-phone'] ? 'is-invalid' : '' ?> form-control"
              name="emergency-phone" id="emergency-phone"
              value="<?= $data['emergency-phone'] ?>">
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <label class="required">Address</label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 col-lg-6">
            <label for="addr-line-1"><small>Line 1</small></label>
            <input type="text"
              class="<?= $errors['addr-line-1'] ? 'is-invalid' : '' ?> form-control"
              name="addr-line-1" id="addr-line-1"
              value="<?= $data['addr-line-1'] ?>">
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 col-lg-6">
            <label for="addr-line-2"><small>Line 2</small></label>
            <input type="text"
              name="addr-line-2" id="addr-line-2" class="form-control"
              value="<?= $data['addr-line-2'] ?>">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-lg-3">
            <label for="addr-city"><small>City</small></label>
            <input type="text"
              class="<?= $errors['addr-city'] ? 'is-invalid' : '' ?> form-control"
              name="addr-city" id="addr-city" value="<?= $data['addr-city'] ?>">
          </div>
          <div class="col-md-2 col-lg-1">
            <label for="addr-state"><small>State</small></label>
            <input type="text"
              class="<?= $errors['addr-state'] ? 'is-invalid' : '' ?> form-control"
              name="addr-state" id="addr-state"
              maxlength="2" 
              value="<?= $data['addr-state'] ?>">
          </div>
          <div class="col-md-2">
            <label for="addr-zip"><small>Zip Code</small></label>
            <input type="text"
              class="<?= $errors['addr-zip'] ? 'is-invalid' : '' ?> form-control"
              name="addr-zip" id="addr-zip"
              value="<?= $data['addr-zip'] ?>">
          </div>
        </div>
        <div class="row mt-4 mb-5">
          <div class="col-md-4 col-lg-3">
            <input type="submit" id="submit" name="submit" value="Register"
            class="btn btn-lg px-5" style="background-color: #f66733; color: white;">
          </div>
        </div>
      </div>
    </form>
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
    var birthday_picker_state = function() {

      var selected_month = $("#child-birth-month").val();

      if (selected_month === "") {
        $("#child-birth-day").val("");
        $("#child-birth-day").prop("disabled", true);
      }
      else {
        $("#child-birth-day").prop("disabled", false);

        var month_days = 31;
        if (['April', 'June', 'September', 'November'].indexOf(selected_month) !== -1) {
          month_days = 30;
        }
        else if (selected_month === 'February') { month_days = 29; }

        if (Number($("#child-birth-day").val()) > month_days) {
          $("#child-birth-day").val("");
        }

        if (month_days === 29) {
          $("#birth-day-30").prop("disabled", true);
          $("#birth-day-31").prop("disabled", true);
        }
        else if (month_days === 30) {
          $("#birth-day-30").prop("disabled", false);
          $("#birth-day-31").prop("disabled", true);
        }
        else {
          $("#birth-day-30").prop("disabled", false);
          $("#birth-day-31").prop("disabled", false);
        }
      }
    }

    $(function() {
      birthday_picker_state();
      $("#child-birth-month").change(function() {
        birthday_picker_state();
      });

      <?php if (anyErrors($errors)) { ?>
        window.location.hash = "register-form";
      <?php } ?>
    });
  </script>
</div><!-- page wrapper -->
</body>
</html>
