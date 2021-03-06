<?php
	include 'config.inc';
?>
<html>
	<body>
		<h4 align='center'>All Things PR</h4>
		<div id='new-pr-section' style='float: left; width: 40%'>
			<fieldset><h3>New PR Details:</h3>
				<form name='new-pr' method="post">
					<table>
						<tr><td>Jira Ticket:</td><td><input type="text" name="jira-ticket" /></td></tr>
						<tr><td>PR Link:</td><td><input type="text" name="pr-link" /></td></tr>
						<tr><td>PR Branch:</td><td><input type="text" name="pr-branch" /></td></tr>
						<tr><td></td><td><input type="submit" name="save-new-pr" value='Save New PR Details' /></td></tr>
					</table>
				</form>
				<?php
					if(isset($_POST['jira-ticket'])) {
						$slash_pos = strpos_all($_POST['pr-link'], '/');
						$pr_number = str_replace('/', '', substr($_POST['pr-link'], $slash_pos[3]));
						insert(['jira-ticket', 'pr-link', 'pr-no', 'pr-branch', 'pr-status', 'creation-date', 'archive-date'], [$_POST['jira-ticket'], $_POST['pr-link'], $pr_number, $_POST['pr-branch'], 0, date('Y-m-d'), '9999-09-09'], 'pr-details');
					}
				?>
			</fieldset></br>
		</div>
		<div id = 'frame-holder' style='float: left; width: 60%'>
			<fieldset>
				<iframe src="iframe_blank_page.html" name="link-frame" height="34.6%" width="100%"></iframe>
			</fieldset>
		</div>
		<div id = 'pr-details-section' style='float: left; width: 100%'>
			<fieldset><h3>Currently Opened PR's: <a target='link-frame' href="archived_pr.php?user=<?php echo $_SESSION['user']; ?>"><img src='images/archive_list.png' alt='Archived List' title="Archived List" /></a></h3>
				<table border=1>
				<th>Jira Ticket ID</th><th>PR Link</th><th>PR Branch</th><th>Action</th>
				<?php
					$opened_pr = select_all('pr-details', ['pr-status', 0]);
					for($i=0; $i < sizeof($opened_pr); $i++){
						echo "<tr>";
						echo "<td>".$opened_pr[$i]['jira-ticket']."</td><td><a href='".$opened_pr[$i]['pr-link']."'>".$opened_pr[$i]['pr-no']."</td><td>".$opened_pr[$i]['pr-branch']."</td>";
						echo "<td>";
							echo "<a href='log_hours.php?pr=".$opened_pr[$i]['pr-no']."' target='link-frame'><img src='images/hourglass.jpg' title='Log Hours' alt='Log Hours'></a> ";
							echo "<img src='images/separator.png' />";
							echo "<a href='edit_pr.php?pr=".$opened_pr[$i]['pr-no']."' target='link-frame'><img src='images/edit.png' alt='Edit PR Details' title='Edit PR Details'></a> ";
							echo "<img src='images/separator.png' />";
							echo "<a href='actions.php?pr=".$opened_pr[$i]['pr-no']."&action=pr&status=1'><img src='images/archive.png' title='Archive PR' alt='Archive PR'></a>";
						echo "</td>";
						echo "</tr>";
					}
				?>
				</table>
			</fieldset>
		</div>
	</body>
</html>
