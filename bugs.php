<?php
	include 'config.inc';
?>
<html>
	<body>
		<h4 align='center'>Defect Details</h4>
    <div id='new-defect-section' style='float: left; width: 40%'>
      <fieldset>
        <h3>New Test Cases:</h3>
        <form name='new-defects' method="post">
          <table>
            <tr><td>Defect Ticket:</td><td><input type="text" name="jira-ticket" style="width: 190px" /></td></tr>
						<tr><td>Defect Summary:</td><td><input type="text" name="jira-summary" style="width: 190px" /></td></tr>
            <tr><td>Logged Hours:</td><td><input type="text" name="bug-logged-hours" style="width: 190px" /></td></tr>
            <tr><td></td><td><input type="submit" name="save-defect" value='Save New Defect' /></td></tr>
          </table>
        </form>
        <?php
        if(isset($_POST['jira-ticket'])) {
          insert(['jira-ticket', 'jira-summary', 'bug-logged-hours', 'date'], [$_POST['jira-ticket'], $_POST['jira-summary'], $_POST['bug-logged-hours'], date('Y-m-d')], 'bug-details');
        }
        ?>
      </fieldset>
    </div>
    <div id='frame-holder' style='float: left; width: 60%'>
			<fieldset>
				<iframe src="iframe_blank_page.html" name="link-frame" height="34.6%" width="100%"></iframe>
			</fieldset>
		</div>
    <div id='bug-details-section' style='float: left; width: 100%'>
      <br>
      <fieldset><h3>This Month's Defects:</h3>
				<table border=1>
				<th>Jira Bug ID</th><th>Jira Bug Summary</th><th>Bug Logged Hours</th><th>Action</th>
				<?php
					$opened_bugs = select_all('bug-details', [], 'AND', "`date` LIKE '".date('Y-m')."%'");
					for($i=0; $i < sizeof($opened_bugs); $i++){
						echo "<tr>";
						echo "<td><center>".$opened_bugs[$i][0]."</center></td><td>".$opened_bugs[$i][1]."</td><td><center>".$opened_bugs[$i][3]."</center></td>";
						echo "<td>";
							echo "<a href='edit_bug_details.php?ticket=".$opened_bugs[$i][0]."' target='link-frame'><img src='images/edit.png' alt='Edit Bug Details' title='Edit Bug Details'></a> ";
							echo "<img src='images/separator.png' />";
							echo "<a href='actions.php?ticket=".$opened_bugs[$i][0]."&action=bug&delete=true'><img src='images/delete.jpg' title='Delete Bug' alt='Delete Bug'></a>";
						echo "</td>";
						echo "</tr>";
					}
				?>
				</table>
			</fieldset>
		</div>
  </body>
</html>
