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
			<h4 align = 'center'>Home</h4>
			<div id = 'sec1' style='float: left; width: 25%'>
			<fieldset>
				<b>My Scripts in progress:</b>
				<table name = 'script_progress' border=1>
					<th>Script Name</th><th>Completion(%)</th>
				</table>
			</fieldset>
			</div>
			<div id = 'sec2' style='float: left; width: 75%'>
			<fieldset><b>Team's Task of the day:</b>
			</fieldset>
			</div>
		</fieldset>
	</body>
</html>
