<?php
	include 'config.inc';
?>
<html>
	<body>
		<h4 align='center'>Automation in Swing</h4>
    <div id='new-pr-section' style='float: left; width: 40%'>
      <fieldset>
        <h3>New Test Cases:</h3>
        <form name='new-tests' method="post">
          <table>
            <tr><td>Jira Ticket:</td><td><input type="text" name="jira-ticket" style="width: 190px" /></td></tr>
						<tr><td>Jira Summary:</td><td><input type="text" name="jira-summary" style="width: 190px" /></td></tr>
            <tr><td>Test Cases<br/>(Semi-colon<br/>[;]<br/>separated):</td><td><textarea name="test-cases" style="width: 190px; height:130px"></textarea></td></tr>
            <tr><td></td><td><input type="submit" name="save-tests" value='Save New Tests' /></td></tr>
          </table>
        </form>
        <?php
        if(isset($_POST['jira-ticket'])) {
          $tests_array = explode(';', $_POST['test-cases']);
          insert(['jira-ticket', 'jira-summary', 'automated-test-cases', 'count', 'date', 'automation-status'], [$_POST['jira-ticket'], $_POST['jira-summary'], $_POST['test-cases'], count($tests_array), date('Y-m-d'), '0'], 'automation-details');
        }
        ?>
      </fieldset>
    </div>
    <div id='frame-holder' style='float: left; width: 60%'>
			<fieldset>
				<iframe src="iframe_blank_page.html" name="link-frame" height="56.4%" width="100%"></iframe>
			</fieldset>
		</div>
    <div id='automation-details-section' style='float: left; width: 100%'>
      <br>
      <fieldset><h3>On-Going Automations: <a target='link-frame' href="archived_automations.php"><img src='images/archive_list.png' alt='Archived List' title="Archived List" /></a></h3>
				<table border=1>
				<th>Jira ID</th><th>Jira Summary</th><th>Test Cases</th><th>Count</th><th>Action</th>
				<?php
					$opened_automations = select_all('automation-details', ['automation-status', 0]);
					for($i=0; $i < sizeof($opened_automations); $i++){
						echo "<tr>";
						echo "<td><center>".$opened_automations[$i][0]."</center></td><td>".$opened_automations[$i][1]."</td><td>".str_replace(';','<br>',$opened_automations[$i][2])."</td><td><center>".$opened_automations[$i][3]."</center></td>";
						echo "<td>";
							echo "<a href='automation_hours.php?ticket=".$opened_automations[$i][0]."' target='link-frame'><img src='images/hourglass.jpg' title='Log Automation Hours' alt='Log Automation Hours'></a> ";
							echo "<a href='edit_automation_details.php?ticket=".$opened_automations[$i][0]."' target='link-frame'><img src='images/edit.png' alt='Edit Automation Details' title='Edit Automation Details'></a> ";
							echo "<a href='actions.php?ticket=".$opened_automations[$i][0]."&action=automation&status=1'><img src='images/archive.png' title='Archive Automation' alt='Archive Automation'></a>";
						echo "</td>";
						echo "</tr>";
					}
				?>
				</table>
			</fieldset>
		</div>
  </body>
</html>
