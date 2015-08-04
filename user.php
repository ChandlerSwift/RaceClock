<?php
$page = "User";
include "includes/top.inc.php";
include_once "includes/db.inc.php";
?>
<?php if (isset($_GET["userid"])) { ?>
		<h1 class="page-header"><?php
	$userlookup = $db->query("SELECT * FROM users WHERE userid='" . $_GET['userid'] . "' LIMIT 1;")->fetchArray(SQLITE3_ASSOC);
	echo $userlookup['fullname'];
?></h1>
		  <div class="row">
		  <div class="col-md-6">
			  <h2 class="sub-header">Personal Dirt Bike Records</h2>
			  <div class="table-responsive">
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th>Place</th>
					  <th>Time</th>
					  <th>Date</th>
					</tr>
				  </thead>
				  <tbody>
	<?php
	   $ret = $db->query("SELECT * FROM times WHERE vehicle=1 AND userid=" . $_GET['userid'] . " ORDER BY time_ms ASC LIMIT 3;");
	   $x = 1;
	   while ($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
		  echo '
		  <tr>
			<th>' . $x . '</th>
			<td>' . $row['time_str'] . "</td>
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
		  </div>
		  <div class="col-md-6">
		  <h2 class="sub-header">Personal Go-kart Records</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Place</th>
                  <th>Time</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
<?php
   $ret = $db->query("SELECT * FROM times WHERE vehicle=2 AND userid=" . $_GET['userid'] . " ORDER BY time_ms ASC LIMIT 3;");
   $x = 1;
   while ($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo '
	  <tr>
		<th>' . $x . '</th>
		<td>' . $row['time_str'] . "</td>
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
		  </div>
		  </div>
		  <div class="row">
			<div class="col-md-6">
			  <h2 class="sub-header">Personal Dirt Bike Stats</h2>
			  <div class="table-responsive">
				<table class="table table-striped">
				  <tbody>
					<tr>
					  <th>Average Time</th>
					  <td><?php
   $ret = $db->query("SELECT avg(time_ms) AS 'average_time' FROM times WHERE vehicle=1 AND userid=" . $_GET['userid'] . ";");
   if ($row = $ret->fetchArray(SQLITE3_ASSOC) and isset($row['average_time']) ) {
      echo formatMilliseconds($row['average_time']);
   } else {
	   echo "None yet!";
   }
?></td>
					</tr>
					<tr>
					  <th>Slowest Time</th>
					  <td><?php
   $ret = $db->query("SELECT * FROM times WHERE vehicle=1 AND userid=" . $_GET['userid'] . " ORDER BY time_ms DESC LIMIT 1;");
   if ($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo $row['time_str'];
   } else {
	   echo "None yet!";
   }
?></td>
					</tr>
				  </tbody>
				</table>
			  </div>
			</div>
			<div class="col-md-6">
			  <h2 class="sub-header">Personal Go-kart Stats</h2>
			  <div class="table-responsive">
				<table class="table table-striped">
				  <tbody>
					<tr>
					  <th>Average Time</th>
					  <td><?php
   $ret = $db->query("SELECT avg(time_ms) AS 'average_time' FROM times WHERE vehicle=2 AND userid=" . $_GET['userid'] . ";");
   if ($row = $ret->fetchArray(SQLITE3_ASSOC) && isset($row['average_time'])) {
      echo formatMilliseconds($row['average_time']);
   } else {
	   echo "None yet!";
   }
?></td>
					</tr>
					<tr>
					  <th>Slowest Time</th>
					  <td><?php
   $ret = $db->query("SELECT * FROM times WHERE vehicle=2 AND userid=" . $_GET['userid'] . " ORDER BY time_ms DESC LIMIT 1;");
   if ($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo $row['time_str'];
   } else {
	   echo "None yet!";
   }
?></td>
					</tr>
				  </tbody>
				</table>
			  </div>
			</div>
		  </div>
<?php } else { ?>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div style="text-align: center;" class="panel-heading">USERS</div>

  <!-- List group -->
<div class="list-group">
<?php
   $sql ="SELECT * from USERS;";

   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      echo '<a href="/user.php?userid=' . $row['userid'] . '"class="list-group-item">' . $row['fullname'] . '</a>';
   }
   $db->close();
?>
</div>
</div>

<?php } ?>
		  
<?php include "includes/bottom.inc.php"; ?>