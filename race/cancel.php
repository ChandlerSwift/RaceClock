<?php
// include_once "../includes/db.inc.php";
include "../includes/race.top.inc.php";
?>
<h2 style="text-align: center;">
<?php
if (file_exists('lockfile.tmp')) {
	touch("stop.tmp");
	echo "Race Cancelled.";
} else {
	echo "No Race In Progress";
}
?>
</h2><br>
<div  style="text-align: center;">
	<a href="./" class="btn btn-lg btn-primary">Next Race!</a>
</div>
<?php include "../includes/race.bottom.inc.php"; ?>