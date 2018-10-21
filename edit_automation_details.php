<?php include 'config.inc'; ?>
<html>
<body>
  <?php $automation = select_all('automation-details', ['jira-ticket', $_GET['ticket']]); ?>
  <h4 align='center'>Edit Automation Details</h4>
  <form name='edit-automation' method="post">
    <table>
      <tr><td>Jira Ticket:</td><td><input type="text" name="jira-ticket" value='<?php echo $automation[0]['jira-ticket'] ?>' /></td></tr>
      <tr><td>Jira Summary:</td><td><input type="text" name="jira-summary" value='<?php echo $automation[0]['jira-summary'] ?>' /></td></tr>
      <tr><td>Test Cases<br/>(Semi-colon<br/>[;]<br/>separated):</td><td><textarea name="test-cases" style="width: 173px; height:130px"><?php echo $automation[0]['automated-test-cases']; ?></textarea></td></tr>
      <tr><td></td><td><input type="submit" name="edit-new-automation" value='Edit Automation Details' /></td></tr>
    </table>
  </form>
  <?php
    if(isset($_POST['jira-ticket'])) {
      $tests_array = explode(';', $_POST['test-cases']);
      update(['jira-ticket', 'jira-summary', 'automated-test-cases', 'count'], [$_POST['jira-ticket'], $_POST['jira-summary'], $_POST['test-cases'], count($tests_array)], 'automation-details', ['jira-ticket', $_GET['ticket']]);
      header('Location: iframe_blank_page.html');
    }
  ?>
</body>
</html>
