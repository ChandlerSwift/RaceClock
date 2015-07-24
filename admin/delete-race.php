<?php include_once "../includes/db.inc.php"; ?>
<!DOCTYPE html>
<html>
<body>

<?php
include_once "../includes/db.inc.php";
	if (isset($_POST["id"])) {
		$db->exec("DELETE FROM times WHERE id = ". $_POST['id']);
		echo 'Race Deleted. <a href="delete-race.php">Delete another?</a> | <a href="/">Home</a>';
	} else { ?>
<a href="/">Back to Home</a><br><br>


<table  border="1" style="border-collapse: collapse;width:100%">
  <tr>
	<th>Race ID</th>
    <th>Time</th>
    <th>Name</th>		
    <th>Date Raced</th>
    <th>Vehicle</th>
  </tr>
<?php
   $ret = $db->query("SELECT * FROM times ORDER BY id ASC LIMIT 100;");
   $x = 1;
   while ($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
	  $userlookup = $db->query("SELECT fullname FROM users WHERE userid='" . $row['userid'] . "'")->fetchArray(SQLITE3_ASSOC);
	  if ($row['vehicle'] == 2) { $vehicle = "Dirt Bike"; } else { $vehicle = "Go-kart"; }
      echo '
	  <tr>
		<th>' . $row['id'] . '</th>
		<td>' . $row['time_str'] . "</td>
		<td>" . $userlookup['fullname'] . "</td>
		<td>" . date("M j\, Y", strtotime($row['timestamp'])) . "</td>
		<td>" . $vehicle ."</td>
	  </tr>";
	  $x++;
   }
   if ($x == 1)
	   echo "<tr><td colspan='4' style='text-align: center;'>Sorry, no results found!</td></tr>";
   $db->close();
?>
</table>
<br><br>
<form action="delete-race.php" method="POST">
<input type="text" name="id" placeholder="Race ID">
<input type="submit" value="Delete">
</form> 
<?php	}
?>
</body>
</html>