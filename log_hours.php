<?php include 'config.inc'; ?>
<html>
<body>
  <h4 align='center'>Log Hours</h4>
  <form name='new-pr' method="post">
    <table><tr><td>Hours Logged Last Month: </td>
      <td>
        <?php
        $lm_pr_hours = select_fields(['hours-logged'], 'pr-hours', ['pr-no', $_GET['pr'], 'username', $_SESSION['user']], 'AND', "`date` LIKE '".date('Y-m', strtotime(date('Y-m-1')." -1 month"))."%'");
        if(sizeof($lm_pr_hours) == 0) { echo '0'; }
        else { echo $lm_pr_hours[0][0]; }
        ?>
      </td></tr>
      <tr><td>Currently Logged Hours This Month: </td>
        <td>
          <?php
          $logged_pr_hours = select_fields(['hours-logged'], 'pr-hours', ['pr-no', $_GET['pr'], 'username', $_SESSION['user']], 'AND', "`date` LIKE '".date('Y-m')."%'");
          if(sizeof($logged_pr_hours) == 0) { echo '0'; }
          else { echo $logged_pr_hours[0][0]; }
          ?>
        </td></tr>
        <tr><td>Log Hours:</td><td><input type="text" name="log-hours" /></td>
          <td></td><td><input type="submit" name="save-logged-hours" value='Save Logged Hours' /></td></tr>
          <?php
          if(isset($_POST['log-hours'])) {
            if(sizeof($logged_pr_hours) > 0) {
              update(['hours-logged'], [$_POST['log-hours'] + $logged_pr_hours[0][0]], 'pr-hours', ['pr-no', $_GET['pr'], 'username', $_SESSION['user']]);
            }
            else {
              insert(['pr-no', 'username', 'date', 'hours-logged'], [$_GET['pr'], $_SESSION['user'], date('Y-m-d'), $_POST['log-hours']], 'pr-hours');
            }
            header('Location: iframe_blank_page.html');
          }
          ?>
        </table>
      </form>
    </body>
    </html>
