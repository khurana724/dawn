<?php
	include 'config.inc';
?>
<html>
	<title>THOR-AUTO : : TMS</title>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
		$(document).ready(function(){
			$("#triple-lines").click(function(){
					$("#links").toggle();
			});
		});
		</script>
	</head>
	<body>
		<fieldset>
			<h1 align='right'>Welcome, Vivek <img id='triple-lines' src="images/lines.jpg" alt='Show/Hide Menu' title="Show/Hide Menu" align='right'/></h1>
			<div id="links" style="display:block">
				<fieldset>
					<strong>
            OPS .:|{|:.
						<a target='main-iframe' href="pr.php">PR Details</a>&nbsp;&nbsp;
						<a target='main-iframe' href="automation.php">Automated Test Cases</a>&nbsp;&nbsp;
						<a target='main-iframe' href="bugs.php">Bug Details</a>&nbsp;&nbsp;
						<a target='main-iframe' href="additions.php">Additional Hours</a>&nbsp;&nbsp;.:|}|:.
            REPORTS .:|{|:.
            <a target='main-iframe' href="daily.php">Daily Report</a>&nbsp;&nbsp;
						<a target='main-iframe' href="weekly.php">Weekly Report</a>&nbsp;&nbsp;
						<a target='main-iframe' href="monthly.php">Monthly Report</a>&nbsp;&nbsp;.:|}|:.
					</strong>
				</fieldset>
			</div>
		</fieldset>
		<br>
    <fieldset>
      <div id='main-frame'>
        <iframe src="pr.php" name="main-iframe"style="width: 100%; height: 500px"></iframe>
      </div>
    </fieldset>
	</body>
</html>
