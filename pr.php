<?php
include 'config.inc';
?>
<html>
	<title>THOR :: AUTO (Home)</title>
	<body>
		<fieldset>
			<h4 align='right'>Welcome, <?php echo $_SESSION['name'] ?> [ <a href='logout.php'>Logout</a> ]</h4>
		</fieldset>
		<br>
		<fieldset>
			<h4 align = 'center'>All Things PR</h4>
			<div id = 'new-pr-section' style='float: left; width: 40%'>
				<fieldset><h3>New PR Details:</h3>
					<form name='new-pr' method="post">
						<table>
							<tr><td>Jira Ticket:</td><td><input type="text" name="jira-ticket" /></td></tr>
							<tr><td>Jira Summary:</td><td><input type="text" name="jira-summary" /></td></tr>
							<tr><td>PR Link:</td><td><input type="text" name="pr-link" /></td></tr>
							<tr><td>PR Branch:</td><td><input type="text" name="pr-branch" /></td></tr>
							<tr><td></td><td><input type="submit" name="save-new-pr" value='Save New PR Details' /></td></tr>
						</table>
					</form>
					<?php
						if(isset($_POST['jira-ticket'])){
							insert(['jira-ticket', 'jira-summary', 'pr-link', 'pr-branch', 'username'], [$_POST['jira-ticket'], $_POST['jira-summary'], $_POST['pr-link'], $_POST['pr-branch'], $_SESSION['user']], 'pr-details');
						}
					?>
				</fieldset></br>
			</div>
			<div id = 'frame-holder' style='float: left; width: 60%'>
				<fieldset>
					<iframe src="iframe_blank_page.html" name="link-frame" height="28%" width="100%"></iframe>
				</fieldset>
			</div>
			<div id = 'pr-details-section' style='float: left; width: 100%'>
				<fieldset><h3>Currently Opened PR's from my account:</h3>
					<table border=1>
					<th>Jira Ticket ID</th><th>Jira Summary</th><th>PR Link</th><th>PR Branch</th><th>Action</th>
					<?php
						$opened_pr = select_all('pr-details', ['username', $_SESSION['user']]);
						for($i=0; $i < sizeof($opened_pr); $i++){
							echo "<tr>";
							echo "<td>".$opened_pr[$i][0]."</td><td>".$opened_pr[$i][1]."</td><td>".$opened_pr[$i][2]."</td><td>".$opened_pr[$i][3]."</td>";
							echo "<td>";
								echo "<a href='log_hours.php?jira=".$opened_pr[$i][0]."' target='link-frame'>Log Hours</a> ";
								echo "<a href='close_pr.php?jira=".$opened_pr[$i][0]."'>Close PR</a> ";
								echo "<a href='edit_pr.php?jira=".$opened_pr[$i][0]."' target='link-frame'>Edit PR Details</a> ";
								echo "<a href='log_review.php?jira=".$opened_pr[$i][0]."&user=".$_SESSION['user']."' target='link-frame'>Log Review</a>";
							echo "</td>";
							echo "</tr>";
						}
					?>
					</table>
				</fieldset>
			</div>
		</fieldset>
	</body>
</html>
