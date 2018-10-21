<?php include 'config.inc'; ?>
<html>
<body>
  <h4 align='center'>Log Hours</h4>
  <form name='new-automation' method="post">
    <table border="1"><tr><td>Hours Logged Last Month: </td>
      <td>
        <?php
        $lm_am_hours = select_fields(['hours-logged'], 'automation-hours', ['jira-ticket', $_GET['ticket']], 'AND', "`date` LIKE '".date('Y-m', strtotime(date('Y-m-1')." -1 month"))."%'");
        if(sizeof($lm_am_hours) == 0) { echo '0'; }
        else { echo $lm_am_hours[0][0]; }
        ?>
      </td></tr>
      <tr><td>Currently Logged Hours This Month: </td>
        <td>
          <?php
          $logged_automation_hours = select_fields(['hours-logged'], 'automation-hours', ['jira-ticket', $_GET['ticket']], 'AND', "`date` LIKE '".date('Y-m')."%'");
          if(sizeof($logged_automation_hours) == 0) { echo '0'; }
          else { echo $logged_automation_hours[0][0]; }
          ?>
        </td></tr>
        <tr><td>Log Hours:</td><td><input type="text" name="log-hours" /></td></tr>
      </table>
      <br><input type="submit" name="save-logged-hours" value='Save Logged Hours' />
    </form>
    <?php
    if(isset($_POST['log-hours'])) {
      if(sizeof($logged_automation_hours) > 0) {
        update(['hours-logged'], [$_POST['log-hours'] + $logged_automation_hours[0][0]], 'automation-hours', ['jira-ticket', $_GET['ticket']]);
      }
      else {
        insert(['jira-ticket', 'date', 'hours-logged'], [$_GET['ticket'], date('Y-m-d'), $_POST['log-hours']], 'automation-hours');
      }
      header('Location: iframe_blank_page.html');
    }
    ?>
  </body>
  </html>
