<?php include 'config.inc'; ?>
<html>
  <body>
    <div id='automation-archived-section' style='float: left; width: 100%'>
      <fieldset><h3>Automation's Archived:</h3>
        <table border=1>
        <th>Jira Ticket ID</th><th>Jira Summary</th><th>Test Cases</th><th>Count</th><th>Action</th>
          <?php
            $archived_automations = select_all('automation-details', ['automation-status', 1]);
            for($i=0; $i < sizeof($archived_automations); $i++){
              echo "<tr>";
              echo "<td><center>".$archived_automations[$i][0]."</center></td><td>".$archived_automations[$i][1]."</td><td>".str_replace(';','<br>',$archived_automations[$i][2])."</td><td><center>".$archived_automations[$i][3]."</center></td>";
              echo "<td>";
                echo "<a href='actions.php?ticket=".$archived_automations[$i][0]."&action=automation&status=0'><img src='images/archive.png' title='Unarchive Automation' alt='Unarchive Automation'></a>";
                echo "<a href='actions.php?ticket=".$archived_automations[$i][0]."&action=automation&delete=true'><img src='images/delete.jpg' title='Delete Automation' alt='Delete Automation'></a>";
              echo "</td>";
              echo "</tr>";
            }
          ?>
        </table>
      </fieldset>
    </div>
  </body>
</html>
