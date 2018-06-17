<?php
  include 'config.inc';
  update(['pr-status'], [1], 'pr-details', ['pr-no',$_GET['pr'],'username',$_GET['user']]);
  header('Location: pr.php');
?>
