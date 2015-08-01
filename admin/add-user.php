<?php
	if (isset($_POST["fullname"])) {
		include_once "../includes/db.inc.php";
		$db->exec("INSERT INTO users (fullname) VALUES ('" . $_POST['fullname']. "')");
		echo 'User Added.<br>';
	} ?>
<a href="/">Back to Home</a><br><br>
<form method="POST" action="add-user.php">
<input type="text" placeholder="First Last" name="fullname">
<input type="submit" value="Submit">
</form>
