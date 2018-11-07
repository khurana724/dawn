<?php include 'config.inc'; ?>
<html>
  <body>
    <div id = 'pr-archived-section' style='float: left; width: 100%'>
      <fieldset><h3>PR's Archived:</h3>
        <table border=1>
        <th>Jira Ticket ID</th><th>Jira Summary</th><th>PR Link</th><th>PR Branch</th><th>Action</th>
          <?php
            $archived_pr = select_all('pr-details', ['pr-status', 1]);
            for($i=0; $i < sizeof($archived_pr); $i++){
              echo "<tr>";
              echo "<td>".$archived_pr[$i][0]."</td><td>".$archived_pr[$i][1]."</td><td>".$archived_pr[$i][3]."</td><td>".$archived_pr[$i][4]."</td>";
              echo "<td>";
                echo "<a href='actions.php?pr=".$archived_pr[$i][2]."&action=pr&status=0'><img src='images/archive.png' title='Unarchive PR' alt='Unarchive PR'></a>";
                echo "<img src='images/separator.png' />";
                echo "<a href='actions.php?pr=".$archived_pr[$i][2]."&action=pr&delete=true'><img src='images/delete.jpg' title='Delete PR' alt='Delete PR'></a>";
              echo "</td>";
              echo "</tr>";
            }
          ?>
        </table>
      </fieldset>
    </div>
  </body>
</html>
