<?php include 'config.inc'; ?>
<html>
<body>
  <fieldset>
    <form name = 'login_form' method = 'post'>
      <table>
        <tr>
          <td><strong>Username:</strong></td><td><input type = 'text' name = 'username' id = 'username'></td>
        </tr>
        <tr>
          <td><strong>Password:</strong></td><td><input type = 'password' name = 'password' id = 'password'></td>
        </tr>
        <tr>
          <td></td><td><br><input type = 'submit' name = 'login' id = 'login' value = 'Validate User'></td>
        </tr>
      </table>
    </form>
  </fieldset>
  <?php
		if(isset($_POST['username'])){
			$row = select_all('login-details');
			for($n=0;$n<sizeof($row);$n++){
				$detail = $row[$n];
				if(($detail['username']==$_POST['username']) && ($detail['password']==$_POST['password'])){
					$_SESSION['reviewer-name'] = $detail['member_name'];
          $logged_row = select_all('pr-logs', ['pr-no', $_GET['pr']]);
          if(sizeof($logged_row) == 0) {
            insert(['pr-no', 'reviewer', 'date', 'reviewer-remarks'], [$_GET['pr'], $detail['member_name'], date('Y-m-d'), ' '], 'pr-logs');
          }
					header('Location: log_review.php?pr='.$_GET['pr']) ;
				}
			}
			echo "Incorrect Username/Password";
		}
	?>
</body>
</html>
