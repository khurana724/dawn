<?php include 'config.inc'; ?>
<html>
<body>
  <?php $bug = select_all('bug-details', ['jira-ticket', $_GET['ticket']]); ?>
  <h4 align='center'>Edit Bug Details</h4>
  <form name='edit-bug' method="post">
    <table>
      <tr><td>Jira Ticket:</td><td><input type="text" name="jira-ticket" value='<?php echo $bug[0]['jira-ticket'] ?>' /></td></tr>
      <tr><td>Jira Summary:</td><td><input type="text" name="jira-summary" value='<?php echo $bug[0]['jira-summary'] ?>' /></td></tr>
      <tr><td>Logged Hours:</td><td><input type="text" name="bug-logged-hours"  value='<?php echo $bug[0]['bug-logged-hours'] ?>' style="width: 190px" /></td></tr>
      <tr><td></td><td><input type="submit" name="edit-new-bug" value='Edit Bug Details' /></td></tr>
    </table>
  </form>
  <?php
    if(isset($_POST['jira-ticket'])) {
      $tests_array = explode(';', $_POST['test-cases']);
      update(['jira-ticket', 'jira-summary', 'bug-logged-hours'], [$_POST['jira-ticket'], $_POST['jira-summary'], $_POST['bug-logged-hours']], 'bug-details');
      header('Location: iframe_blank_page.html');
    }
  ?>
</body>
</html>
