<?php
include 'config.inc';
?>
<html>
  <body>
    <fieldset>
      <h4 align='center'>Log Hours</h4>
      <form name='new-pr' method="post">
        <table>
          <tr><td>Currently Logged Hours this month: </td>
          <td>
            <?php
              
             ?>
          </td></tr>
          <tr><td>Log Hours:</td><td><input type="text" name="log-hours" /></td>
          <td></td><td><input type="submit" name="save-logged-hours" value='Save Logged Hours' /></td></tr>
      </table>
      </form>
    </fieldset>
  </body>
</html>
