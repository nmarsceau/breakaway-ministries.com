<?php
function display_copyright_notice($initial_year) {
  if (!isset($initial_year)) return '';
  $initial_year = intval($initial_year);
  if ($initial_year == 0) return '';

  $notice_constructor = array('&copy;&nbsp;');
  $current_year = intval((new DateTime())->format('Y'));

  if ($initial_year < $current_year) array_push($notice_constructor, $initial_year.'-');
  array_push($notice_constructor, $current_year);

  return implode('', $notice_constructor);
}
?>

<footer class="footer flex-size-auto bg-dark text-light">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 p-5">
        <?= display_copyright_notice(2018) ?>&nbsp;Breakaway Sports Ministries<br>
        Greenville, SC<br>
        <a href="contact.php" class="text-light">Contact Us</a>
        <div class="mt-3">
          <a href="https://www.facebook.com/Breakaway-Sports-Ministries-81378962634/"
          target="_blank">
            <img src="facebook.png" width="35px" height="35px">
          </a>
        </div>
      </div>
    </div>
  </div>
</footer>