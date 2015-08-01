<?php
include_once "../includes/db.inc.php";
include "../includes/race.top.inc.php";
?>
      <form class="form-signin" action="go.php" method="POST">
        <h2 class="form-signin-heading">Set up Race</h2>
        
        <select placeholder="Racer Name" name="userid" class="form-control" autofocus>
          <option value='' disabled selected style='display:none;'>Racer Name</option>
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

        <div id="vehicle-select" class="center">
          <input name="vehicle" type="checkbox" checked data-toggle="toggle" data-on="Dirt Bike" data-off="Go-kart" data-onstyle="info" data-offstyle="info">
        </div>
        <br><br>
        
        <button class="btn btn-lg btn-success btn-block" type="submit">Race!</button>
      </form>
<?php include "../includes/race.bottom.inc.php"; ?>