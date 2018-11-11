<?php
	include '../config.inc';
?>
<html>
  <title>THOR-AUTO : : Daily Task Status Report</title>
  <body>
    Hi All,<br><br>
    <strong><u>Issues/Remarks/Concerns</u></strong>: None<br><br>
    <strong><u>Management Tasks</u></strong>:
    <ul>
      <li>Prepared and sent task status report</li>
    </ul>
    <strong><u>Accomplishments of the day</u></strong>:
    <br><br>
		<fieldset>
      <ul>
      <?php
        $new_prs = select_all('pr-details', ['pr-status', 0, 'creation-date', date('Y-m-d')]);
        $new_tickets = select_all('automation-details', ['automation-status', 0, 'date', date('Y-m-d')]);
        $progressions = select_all('automation-hours', ['stage', 'updated', 'date', date('Y-m-d')]);
        $reviews = select_all('pr-hours', ['date', date('Y-m-d')]);
				$defects = select_all('bug-details', ['date', date('Y-m-d')]);
        // New PR Section
        if (sizeof($new_prs) > 0 && sizeof($new_prs) == 1) {
          echo "<li>Created a new PR for ".$new_prs[0]['jira-ticket'].", details below:<br>";
            echo "<table border='1'>";
              echo "<th>PR Link</th><th>Branch Name</th>";
              echo "<tr>";
                echo "<td><center><a href='".$new_prs[0]['pr-link']."'>".$new_prs[0]['pr-no']."</a></center></td>";
                echo "<td>".$new_prs[0]['pr-branch']."</td>";
              echo "</tr>";
            echo "</table>";
          echo "</li>";
        }
        elseif (sizeof($new_prs) > 1) {
          echo "<li>Created ".sizeof($new_prs)." new PRs, details below:<br>";
          echo "<table border='1'>";
            echo "<th>PR Link</th><th>Branch Name</th>";
            for($i=0; $i < sizeof($new_prs); $i++) {
              echo "<tr>";
                echo "<td><center><a href='".$new_prs[$i]['pr-link']."'>".$new_prs[$i]['pr-no']."</a></center></td>";
                echo "<td>".$new_prs[$i]['pr-branch']."</td>";
              echo "</tr>";
            }
          echo "</table>";
          echo "</li>";
        }

        // New Automation Details
        if (sizeof($new_tickets) > 0) {
          echo "<li>Started work on the below mentioned Jira tickets:<br>";
          echo "<table border='1'>";
            echo "<th>Task ID</th><th>Summary</th>";
            for($i=0; $i < sizeof($new_tickets); $i++) {
              echo "<tr>";
                echo "<td><center><a href='".$new_tickets[$i]['jira-ticket']."'>".$new_tickets[$i]['jira-ticket']."</a></center></td>";
                echo "<td>".$new_tickets[$i]['jira-summary']."</td>";
              echo "</tr>";
            }
          echo "</table>";
          echo "</li>";
        }

        // In Progress Automation/Tasks
        if (sizeof($progressions) > 0) {
          echo "<li>Work in progress for the below mentioned Jira tickets:<br>";
          echo "<table border='1'>";
            echo "<th>Task ID</th><th>Summary</th>";
            for($i=0; $i < sizeof($progressions); $i++) {
              echo "<tr>";
                echo "<td><center><a href='".$progressions[$i]['jira-ticket']."'>".$progressions[$i]['jira-ticket']."</a></center></td>";
                echo "<td>".select_fields(['jira-summary'], 'automation-details', ['jira-ticket', $progressions[$i]['jira-ticket']])[0][0]."</td>";
              echo "</tr>";
            }
          echo "</table>";
          echo "</li>";
        }

        // Review Comments
        if (sizeof($reviews) > 0) {
          echo "<li>Implemented review comments on the below mentioned Pull Requests:<br>";
          echo "<table border='1'>";
            echo "<th>PR Link</th><th>PR Branch</th>";
            for($i=0; $i < sizeof($reviews); $i++) {
              echo "<tr>";
                echo "<td><center><a href='".select_fields(['pr-link'], 'pr-details', ['pr-no', $reviews[$i]['pr-no']])[0][0]."'>".$reviews[$i]['pr-no']."</a></center></td>";
                echo "<td>".select_fields(['pr-branch'], 'pr-details', ['pr-no', $reviews[$i]['pr-no']])[0][0]."</td>";
              echo "</tr>";
            }
          echo "</table>";
          echo "</li>";
        }

				// Reported Defects
				if (sizeof($defects) > 0 && sizeof($defects) == 1) {
          echo "<li>Reported a new defect in Jira, details below:<br>";
            echo "<table border='1'>";
              echo "<th>Defect</th><th>Defect Summary</th>";
              echo "<tr>";
                echo "<td><center><a href='".$defects[0]['jira-ticket']."'>".$defects[0]['jira-ticket']."</a></center></td>";
                echo "<td>".$defects[0]['jira-summary']."</td>";
              echo "</tr>";
            echo "</table>";
          echo "</li>";
        }
        elseif (sizeof($defects) > 1) {
					echo "<li>Reported ".sizeof($defects)." new defects in Jira, details below:<br>";
						echo "<table border='1'>";
							echo "<th>Defect</th><th>Defect Summary</th>";
	            for($i=0; $i < sizeof($defects); $i++) {
	              echo "<tr>";
									echo "<td><center><a href='".$defects[$i]['jira-ticket']."'>".$defects[$i]['jira-ticket']."</a></center></td>";
									echo "<td>".$defects[$i]['jira-summary']."</td>";
	              echo "</tr>";
	            }
	          echo "</table>";
          echo "</li>";
        }
       ?>
       </ul>
    </fieldset><br>
		<strong><u>Resources</u></strong>: 1 Automation Lead & 1 Automation Engineer
		<br><br>
		--<br>
		Thanks
  </body>
</html>
