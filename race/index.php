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
          <input id="vehicle-select-input" name="vehicle" type="checkbox" checked data-toggle="toggle" data-on="Dirt Bike" data-off="Go-kart" data-onstyle="info" data-offstyle="info">
        </div>
		<br>
		<div id="track-select" class="center">
          <input id="track-select-input" name="track" type="checkbox" checked data-toggle="toggle" data-on="Grass" data-off="Dirt" data-onstyle="info" data-offstyle="info">
        </div>
        <br><br>
        
        <button class="btn btn-lg btn-success btn-block" type="submit">Race!</button>
      </form>
	  <script>
		  $(function() {
			var trackSelect;
			$('#vehicle-select-input').change(function() {
				if ($('#vehicle-select-input').prop('checked') === true) { // Dirt Bike
					$('#track-select-input').bootstrapToggle('enable') // Allow Track Switching
					$('#track-select-input').bootstrapToggle((trackSelect) ? 'on':'off') // Allow Track Switching
				} else { // Go Kart
					trackSelect = $('#track-select-input').prop('checked') // Save value if switched back
					$('#track-select-input').bootstrapToggle('off') // Force Dirt Track
					$('#track-select-input').bootstrapToggle('disable') // Disable Track Switching
				}
			})
		  })
	  </script>
<?php include "../includes/race.bottom.inc.php"; ?>