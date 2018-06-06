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
			<div id = 'sec1' style='float: left; width: 100%'>
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

				<fieldset><h3>Currently Opened PR's from my account:</h3>
					<table border=1>
					<th>Jira Ticket ID</th><th>Jira Summary</th><th>PR Link</th><th>PR Branch</th><th>Action</th>
					<?php
						$opened_pr = select_all('pr-details', ['username', $_SESSION['user']]);
						for($i=0; $i < sizeof($opened_pr); $i++){
							echo "<tr>";
							echo "<td>".$opened_pr[$i][0]."</td><td>".$opened_pr[$i][1]."</td><td>".$opened_pr[$i][2]."</td><td>".$opened_pr[$i][3]."</td>";
							echo "<td><a href='#'>Log Hours</a> <a href='#'>Close PR</a> <a href='#'>Edit PR Details</a> <a href='#'>Log Review</a> </td>";
							echo "</tr>";
						}
					?>
					</table>
				</fieldset>
			</div>
		</fieldset>
	</body>
</html>
