<?php include 'config.inc'; ?>
<html>
<body>
  <fieldset>
    <h4 align='center'>Log Internal Review, <?php echo $_SESSION['reviewer-name'] ?></h4>
    <form name='edit-pr' method="post">
      <table>
        <tr><td>Review Comments:</td><td><textarea name='reviewer-remarks'></textarea></td></tr>
        <tr><td></td><td><input type="submit" name="log-review" value='Log Your Review' /></td></tr>
      </table>
    </form>
    <?php
      if(isset($_POST['reviewer-remarks'])) {
        update(['reviewer-remarks'], [$_POST['reviewer-remarks']], 'pr-logs', ['reviewer', $_SESSION['reviewer-name'], 'pr-no', $_GET['pr']]);
        header('Location: iframe_blank_page.html');
      }
    ?>
</body>
</html>
