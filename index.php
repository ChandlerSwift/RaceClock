<?php
$page = "Records";
include "includes/top.inc.php";
include_once "includes/db.inc.php";
?>
          <h2 class="sub-header">Dirt Bike Records <a href="/dirtbike.php"><small>More...</small></a></h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Place</th>
                  <th>Time</th>
                  <th>Name</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
<?php
   $ret = $db->query("SELECT * FROM times WHERE vehicle=1 ORDER BY time_ms ASC LIMIT 3;");
   $x = 1;
   while ($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
	  $userlookup = $db->query("SELECT fullname FROM users WHERE userid='" . $row['userid'] . "'")->fetchArray(SQLITE3_ASSOC);
      echo '
	  <tr>
		<th>' . $x . '</th>
		<td>' . $row['time_str'] . "</td>
		<td>" . $userlookup['fullname'] . "</td>
		<td>" . date("M j\, Y", strtotime($row['timestamp'])) . "</td>
	  </tr>";
	  $x++;
   }
   if ($x == 1)
	   echo "<tr><td colspan='4' style='text-align: center;'>Sorry, no results found!</td></tr>";
?>
              </tbody>
            </table>
          </div>
		  <br><br><br>
		  
		  <h2 class="sub-header">Go-kart Records <a href="/gokart.php"><small>More...</small></a></h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Place</th>
                  <th>Time</th>
                  <th>Name</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
<?php
   $ret = $db->query("SELECT * FROM times WHERE vehicle=2 ORDER BY time_ms ASC LIMIT 3;");
   $x = 1;
   if ($ret->numColumns() == 0)
	   echo "Sorry! No results found!";
   while ($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
	  $userlookup = $db->query("SELECT fullname FROM users WHERE userid='" . $row['userid'] . "'")->fetchArray(SQLITE3_ASSOC);
      echo '
	  <tr>
		<th>' . $x . '</th>
		<td>' . $row['time_str'] . "</td>
		<td>" . $userlookup['fullname'] . "</td>
		<td>" . date("M j\, Y", strtotime($row['timestamp'])) . "</td>
	  </tr>";
	  $x++;
   }
   if ($x == 1)
	   echo "<tr><td colspan='4' style='text-align: center;'>Sorry, no results found!</td></tr>";
?>
              </tbody>
            </table>
          </div>
		  
<?php include "includes/bottom.inc.php"; ?>