<?php
if (!isset($_POST['userid'])) {
	header("Location: ./");
	exit;
}
unlink('status.json');

include_once "../includes/db.inc.php";

if (!file_exists('lockfile.tmp')) {
	if (isset($_POST['vehicle'])) {
		$vehicle_db = 1;
	} else {
		$vehicle_db = 2;
	}
	exec('sudo ./go.py ' . $_POST['userid'] . ' ' . $vehicle_db . ' 1 > logfile.log 2>&1 &'); // 1 is track number - to be updated!
} else {
	exit("Race already in progress! <a href='cancel.php'>Cancel Race?</a>");
}


if (isset($_POST['vehicle'])) {
	$vehicle = "Dirt Bike";
} else {
	$vehicle = "Go-kart";
}

if (isset($_POST['track'])) {
	$track = "Grass";
} else {
	$track = "Dirt";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.ico">
    <title>Swift Racing</title>
    <script src="/js/jquery-1.11.1.min.js"></script>
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="/css/race.css" rel="stylesheet" type="text/css" />
    <script src="/js/bootstrap.min.js"></script>
    <link href="/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="/js/bootstrap-toggle.min.js"></script>
	<script src="/js/stopwatch.js"></script>
	<script>
	$(function() {
		show();
		setTimeout(start, 5500);
	});
	
	var updateInterval = setInterval(ajaxUpdate, 500);
	
	function ajaxUpdate() {
		$.get("status.json", function(response) {
		$('#status-content').text(response['status-display']);
		if (response['status'] == "done")
			cleanup(response);
	});
	}
	
	function cleanup(responseObject) {
		clearInterval(updateInterval);
		console.log['cleaning up'];
		$('#bottomButton').text('Next Race').toggleClass('btn-danger', false).toggleClass('btn-success', true).attr('href', './');
		stop();
		$('#total-time-status').text(responseObject['time']);
	}
	</script>
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
		<h2 id="status-title" class="form-signin-heading">Race Status</h2>
		<div class="well" id="race-time-status"><h3 style="margin: 0px;" id="total-time-status"></h3></div>
			<table class="table" id="status-table">
				<tr>
					<th>Status:</th>
					<td id="status-content">Queued</td>
				</tr>
				<tr>
					<th>Racer:</th>
					<td><?php
					   $sql ="SELECT fullname FROM users WHERE userid=" . $_POST['userid'] . ";";
					   $ret = $db->query($sql);
					   $row = $ret->fetchArray(SQLITE3_ASSOC);
					   echo $row['fullname'];
					?></td>
				</tr>
				<tr>
					<th>Vehicle:</th>
					<td><?= $vehicle ?></td>
				</tr>
				<tr>
					<th>Track:</th>
					<td><?= $track ?></td>
				</tr>
			</table>
			<a href="cancel.php" id="bottomButton" class="btn btn-lg btn-danger btn-block">Cancel Race</a>
		</div>
  </body>
</html>