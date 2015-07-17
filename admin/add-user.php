<?php
	if (isset($_POST["fullname"])) {
		include_once "../includes/db.inc.php";
		$db->exec("INSERT INTO users (fullname) VALUES ('" . $_POST['fullname']. "')");
		echo 'User Added. <a href="add-user.php">Add another?</a> | <a href="/">Home</a>';
	} else { ?>
<form method="POST" action="add-user.php">
<input type="text" placeholder="First Last" name="fullname">
<input type="submit" value="Submit">
</form> 
<?php } ?>