<?php
  include 'config.inc';

  // PR Archiving and Unarchiving
  if ($_GET['status'] == 1) {
    update(['pr-status'], [1], 'pr-details', ['pr-no',$_GET['pr'],'username',$_GET['user']]);
    header('Location: pr.php');
  }
  elseif ($_GET['status'] == 0) {
    update(['pr-status'], [0], 'pr-details', ['pr-no',$_GET['pr'],'username',$_GET['user']]);
    header('Location: iframe_blank_page.html');
  }

  // PR Deletion
  if($_GET['delete'] == 'true') {
    delete_fields('pr-details', ['pr-no',$_GET['pr'],'username',$_GET['user']]);
    header('Location: iframe_blank_page.html');
  }

?>
