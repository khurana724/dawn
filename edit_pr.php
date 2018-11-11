<?php include 'config.inc'; ?>
<html>
<body>
  <fieldset>
    <?php $pr = select_all('pr-details', ['pr-no', $_GET['pr']]); ?>
    <h4 align='center'>Edit PR Details</h4>
    <form name='edit-pr' method="post">
      <table>
        <tr><td>Jira Ticket:</td><td><input type="text" name="jira-ticket" value='<?php echo $pr[0]['jira-ticket'] ?>' /></td></tr>
        <tr><td>PR Link:</td><td><input type="text" name="pr-link" value='<?php echo $pr[0]['pr-link'] ?>' /></td></tr>
        <tr><td>PR Branch:</td><td><input type="text" name="pr-branch" value='<?php echo $pr[0]['pr-branch'] ?>' /></td></tr>
        <tr><td></td><td><input type="submit" name="edit-new-pr" value='Edit PR Details' /></td></tr>
      </table>
    </form>
    <?php
      if(isset($_POST['jira-ticket'])) {
        $slash_pos = strpos_all($_POST['pr-link'], '/');
        $pr_number = str_replace('/', '', substr($_POST['pr-link'], $slash_pos[3]));
        update(['jira-ticket', 'pr-link', 'pr-no', 'pr-branch'], [$_POST['jira-ticket'], $_POST['pr-link'], $pr_number, $_POST['pr-branch']], 'pr-details', ['pr-no', $_GET['pr']]);
        header('Location: iframe_blank_page.html');
      }
    ?>
</body>
</html>
