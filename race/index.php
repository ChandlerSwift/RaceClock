<?php
include_once "../includes/db.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.ico">
    <title>Race! &middot; Swift Racing</title>
    <script src="/js/jquery-1.11.1.min.js"></script>
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="/css/race.css" rel="stylesheet" type="text/css" />
    <script src="/js/bootstrap.min.js"></script>
    <link href="/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="/js/bootstrap-toggle.min.js"></script>
  </head>

  <body>
      <div id="nav-wrapper">
        <ul class="nav nav-tabs">
          <li role="presentation"><a href="/">Stats</a></li>
          <li role="presentation"><a href="/admin/">Admin</a></li>
          <li role="presentation" class="active"><a href="#">Race!</a></li>
        </ul>
      </div>
    
    <div class="container">
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
        
        <div id="laps-select" class="center">
          <label class="radio-inline">
            <input type="radio" name="laps" value="1"> 1 lap
          </label>
          <label class="radio-inline">
            <input type="radio" name="laps" value="3" checked> 3 laps
          </label>
          <label class="radio-inline">
            <input type="radio" name="laps" value="5"> 5 laps
          </label>
        </div>
        <br>
        
        <div id="vehicle-select" class="center">
          <input name="vehicle" type="checkbox" checked data-toggle="toggle" data-on="Dirt Bike" data-off="Go-kart" data-onstyle="info" data-offstyle="success">
        </div>
        <br><br><br>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Race!</button>
      </form>
    </div>
  </body>
</html>