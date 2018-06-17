<?php
  include 'config.inc';
  if ($_GET['status'] == 1) {
    update(['pr-status'], [1], 'pr-details', ['pr-no',$_GET['pr'],'username',$_GET['user']]);
    header('Location: pr.php');
  }
  elseif ($_GET['status'] == 0) {
    update(['pr-status'], [0], 'pr-details', ['pr-no',$_GET['pr'],'username',$_GET['user']]);
    header('Location: iframe_blank_page.html');
  }

?>
