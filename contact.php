<?php require_once('config.php');

$errors = array(
  'name' => false,
  'email' => false,
  'phone' => false,
  'addr-line-1' => false,
  'addr-city' => false,
  'addr-state' => false,
  'addr-zip' => false
);

function anyErrors(&$errors) {
  return count(array_filter($errors)) ? true : false;
}

if (isset($_POST['submit'])) {
  if (!isset($_POST['name']) || trim($_POST['name']) == '') {
    $errors['name'] = true;
  }
  if (!isset($_POST['email']) || trim($_POST['email']) == '') {
    $errors['email'] = true;
  }
  if (isset($_POST['email']) && !$errors['email'] && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = true;
  }
  if (!isset($_POST['phone']) || trim($_POST['phone']) == '') {
    $errors['phone'] = true;
  }
  if (!isset($_POST['addr-line-1']) || trim($_POST['addr-line-1']) == '') {
    $errors['addr-line-1'] = true;
  }
  if (!isset($_POST['addr-city']) || trim($_POST['addr-city']) == '') {
    $errors['addr-city'] = true;
  }
  if (!isset($_POST['addr-state']) || trim($_POST['addr-state']) == '') {
    $errors['addr-state'] = true;
  }
  if (!isset($_POST['addr-zip']) || trim($_POST['addr-zip']) == '') {
    $errors['addr-zip'] = true;
  }
  if (anyErrors($errors)) {
    $data = $_POST;
  }
  else {
    $msg = "New Contact Us Submission\n\n";
    $msg .= "Name: " . $_POST['name'] . "\n";
    $msg .= "Email: " . $_POST['email'] . "\n";
    $msg .= "Phone: " . $_POST['phone'] . "\n";
    $msg .= "Address:\n";
    $msg .= $_POST['addr-line-1'] . "\n";
    if (isset($_POST['addr-line-2']) && trim($_POST['addr-line-2']) !== '') {
      $msg .= $_POST['addr-line-2'] . "\n";
    }
    $msg .= $_POST['addr-city'] . ', ' . $_POST['addr-state'] . ' ' . $_POST['addr-zip'];
    if (isset($_POST['comment']) && trim($_POST['comment']) !== '') {
      $msg .= "\n\nComments:\n" . $_POST['comment'];
    }
    
    $headers = "From: " . $_POST['email'];
    mail($conf['email-address'], "Breakaway - New Contact Us Submission", $msg, $headers);
    
    header('Location: contact.php?form_success');
    exit();
  }
}
else {
  $data = [
    'name' => '',
    'email' => '',
    'phone' => '',
    'addr-line-1' => '',
    'addr-line-2' => '',
    'addr-city' => '',
    'addr-state' => '',
    'addr-zip' => '',
    'comment' => ''
  ];
}

?>

<html>
<head>
  <title>Contact | Breakaway Sport Ministries</title>

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
$active_menu_item = 'contact';
require('header.php');
?>

  <div class="flex-fill-space">
    <div class="container">
      <?php if (isset($_GET['form_success'])) { ?>
        <div class="alert alert-success text-center">
          <p class="mb-0">
            <strong>Success!</strong> You will now receive general updates from us.
          </p>
        </div>
      <?php } ?>
      <?php if (anyErrors($errors)) { ?>
        <div class="alert alert-danger text-center">
          <p class="mb-0">Please fill out all the required fields below</p>
        </div>
      <?php } ?>
    
      <div class="row mb-5">
        <h1 class="col-12 mb-3">Contact Us</h1>
        <p class="col-lg-8">
          Want to hear more about Breakaway&apos;s ministry? Fill out the form below to sign up to receive general information and updates from Breakaway.
        </p>
      </div>
      <form action="contact.php" method="post">
        <div class="row mb-4">
          <div class="col-md-8 col-lg-4">
            <label for="name" class="required">Name</label>
            <input type="text" name="name" id="name"
              class="<?= $errors['name'] ? 'is-invalid' : '' ?> form-control"
              value="<?= $data['name'] ?>">
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-md-8 col-lg-4">
            <label for="email" class="required">Email Address</label>
            <input type="email" name="email" id="email"
              class="<?= $errors['email'] ? 'is-invalid' : '' ?> form-control"
              value="<?= $data['email'] ?>">
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-md-8 col-lg-4">
            <label for="phone" class="required">Phone Number</label>
            <input type="text" name="phone" id="phone"
              class="<?= $errors['phone'] ? 'is-invalid' : '' ?> form-control"
              value="<?= $data['phone'] ?>">
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <label class="required">Address</label>
          </div>
          <div class="col-md-9 col-lg-6">
            <label for="addr-line-1"><small>Line 1</small></label>
            <input type="text" name="addr-line-1" id="addr-line-1"
              class="<?= $errors['addr-line-1'] ? 'is-invalid' : '' ?> form-control mb-3"
              value="<?= $data['addr-line-1'] ?>">
            <label for="addr-line-2"><small>Line 2</small></label>
            <input type="text" name="addr-line-2" id="addr-line-2" class="form-control mb-3"
              value="<?= $data['addr-line-2'] ?>">
            <div class="row mb-2">
              <div class="col-sm-6">
                <label for="addr-city"><small>City</small></label>
                <input type="text" name="addr-city" id="addr-city"
                  class="<?= $errors['addr-city'] ? 'is-invalid' : '' ?> form-control mb-3"
                  value="<?= $data['addr-city'] ?>">
              </div>
              <div class="col-sm-3">
                <label for="addr-state"><small>State</small></label>
                <input type="text" name="addr-state" id="addr-state" maxlength="2"
                  class="<?= $errors['addr-state'] ? 'is-invalid' : '' ?> form-control mb-3"
                  value="<?= $data['addr-state'] ?>">
              </div>
              <div class="col-sm-3">
                <label for="addr-zip"><small>Zip Code</small></label>
                <input type="text" name="addr-zip" id="addr-zip" maxlength="5"
                  class="<?= $errors['addr-zip'] ? 'is-invalid' : '' ?> form-control mb-3"
                  value="<?= $data['addr-zip'] ?>">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 col-lg-6">
            <label for="comment" class="not-required">Comments</label>
            <textarea rows="5" name="comment" id="comment" class="form-control"><?=
              $data['comment']
            ?></textarea>
          </div>
        </div>
        <div class="row mt-4 mb-5">
          <div class="col-12">
            <input type="submit" name="submit" value="Submit" class="btn btn-lg btn-success px-5">
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
</div> <!-- page wrapper -->
</body>
</html>
