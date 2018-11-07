<?php
include 'config.inc';
?>
<html>
<body>
	<h4 align='center'>Additonal Details</h4>
	<div id='addition-section' style='float: left; width: 100%'>
		<form name='new-additions' method="post">
			<table border="1">
				<th>Type of Task</th><th>Task Name</th><th>Task Hours</th>
				<tr>
					<td>
						<select name='task-type' style="width:100px">
							<option value="Report">Report</option>
							<option value="Meeting">Meeting</option>
							<option value="Others">Others</option>
						</select>
					</td>
					<td><input type="text" name="task-name" /></td>
					<td><input type="text" name="task-hours" /></td>
				</tr>
			</table>
			<br><input type="submit" name="save-additional" value='Save Additional Work Details' />
		</form>
		<?php
			if(isset($_POST['task-name'])) {
				insert(['type', 'name', 'hours', 'date'], [$_POST['task-type'], $_POST['task-name'], $_POST['task-hours'], date('Y-m-d')], 'additions');
			}
		?>
	</div>
	<div id='addition-task-details' style='float: left; width: 100%'>
		<fieldset><h3>Additonal Tasks of the Month:</h3>
			<table border=1>
				<th>Task Details</th><th>Task Hours</th><th>Date</th><th>Action</th>
				<?php
				$task_records = select_all('additions', [], 'AND', "`date` LIKE '".date('Y-m')."%'");
				for($i=0; $i < sizeof($task_records); $i++){
					echo "<tr>";
					echo "<td>".$task_records[$i]['name']."</td><td><center>".$task_records[$i]['hours']."<center></td><td>".$task_records[$i]['date']."</td>";
					echo "<td><center>";
					echo '------';
					echo "</center></td>";
				}
				 ?>
			</table>
		</fieldset>
	</div>
	<div id='additional-details-section' style='float: left; width: 100%'>

	</div>
</body>
</html>
