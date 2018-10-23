<?php
  include 'config.inc';

  // PR Archiving and Unarchiving
  if ($_GET['status'] == 1 && $_GET['action'] == 'pr') {
    update(['pr-status'], [1], 'pr-details', ['pr-no', $_GET['pr']]);
    header('Location: pr.php');
  }
  elseif ($_GET['status'] == 0 && $_GET['action'] == 'pr') {
    update(['pr-status'], [0], 'pr-details', ['pr-no', $_GET['pr']]);
    header('Location: iframe_blank_page.html');
  }

  // PR Deletion
  if($_GET['delete'] == 'true' && $_GET['action'] == 'pr') {
    delete_fields('pr-details', ['pr-no', $_GET['pr']]);
    header('Location: iframe_blank_page.html');
  }

  // Automation Archiving and Unarchiving
  if ($_GET['status'] == 1 && $_GET['action'] == 'automation') {
    update(['automation-status'], [1], 'automation-details', ['jira-ticket', $_GET['ticket']]);
    header('Location: automation.php');
  }
  elseif ($_GET['status'] == 0 && $_GET['action'] == 'automation') {
    update(['automation-status'], [0], 'automation-details', ['jira-ticket', $_GET['ticket']]);
    header('Location: iframe_blank_page.html');
  }

  // Automation Deletion
  if($_GET['delete'] == 'true' && $_GET['action'] == 'automation') {
    delete_fields('automation-details', ['jira-ticket', $_GET['ticket']]);
    header('Location: iframe_blank_page.html');
  }

  // Bug Deletion
  if($_GET['delete'] == 'true' && $_GET['action'] == 'bug') {
    delete_fields('bug-details', ['jira-ticket', $_GET['ticket']]);
    header('Location: bugs.php');
  }
?>
