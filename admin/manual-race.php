<!DOCTYPE html>
<html>
<body>
<?php
include_once "../includes/db.inc.php";
	if (isset($_POST["userid"])) {
		$time_ms = (($_POST['time-min'] * 60000) + ($_POST['time-sec'] * 1000) + $_POST['time-ms']);
		$timestr = $_POST['time-min'].":".$_POST['time-sec'].".".$_POST['time-ms'];
		$db->exec("INSERT INTO times (userid,vehicle,time_ms,time_str,timestamp,rs) VALUES ('" . $_POST['userid']. "','" . $_POST['vehicle'] . "','" . $time_ms."','".$timestr."','".$_POST['timestamp']."','".$_POST['rs']."')");
		echo 'Race Added. <a href="manual-race.php">Add another?</a> | <a href="/">Home</a>';
	} else { ?>
<a href="/">Back to Home</a><br><br>
<form action="manual-race.php" method="POST">
Racer:
<select name="userid">
<?php
   $sql = "SELECT * from USERS;";
   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      echo '<option value="' . $row['userid'] . '">' . $row['fullname'] . "</option>\n";
   }
   $db->close();
?>
</select>
<br>
date and time: <input type="datetime-local" name="timestamp">
<br>
  Time:
  <input type="text" name="time-min" maxlength="1" size="1" placeholder="Min">:<input type="text" name="time-sec" maxlength="2" size="2" placeholder="Sec">.<input type="text" name="time-ms" maxlength="3" size="3" placeholder="ms">
  <br>
 Vehicle: <input type="radio" name="vehicle" value="1" checked> Dirt Bike 
  <input type="radio" name="vehicle" value="2"> Go-kart<br>
  <input type="checkbox" name="rs" value="rs"> Rolling Start?<br>
  <input type="submit" value="Submit">
</form>

<?php	}
?>

</body>
</html>