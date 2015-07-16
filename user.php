<?php
$page = "User";
include "includes/top.inc.php";
?>
		<h1 class="page-header"><?php echo $_GET['user']; ?></h1>
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
                <tr>
                  <th>1</th>
                  <td>1:15.025</td>
                  <td>7/13/15</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>1:16.309</td>
                  <td>7/15/15</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>1:16.998</td>
                  <td>7/12/15</td>
                </tr>
              </tbody>
            </table>
          </div>
		  <hr>
		  <h2 class="sub-header">Personal Dirt Bike Stats</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <tbody>
                <tr>
                  <th>Average Time</th>
                  <td>1:25.025</td>
                </tr>
                <tr>
                  <th>Slowest Time</th>
                  <td>1:16.309</td>
                </tr>
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
                <tr>
                  <th>1</th>
                  <td>1:15.025</td>
                  <td>7/13/15</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>1:16.309</td>
                  <td>7/15/15</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>1:16.998</td>
                  <td>7/12/15</td>
                </tr>
              </tbody>
            </table>
          </div>
		  <hr>
		   <h2 class="sub-header">Personal Go-kart Stats</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <tbody>
                <tr>
                  <th>Average Time</th>
                  <td>1:25.025</td>
                </tr>
                <tr>
                  <th>Slowest Time</th>
                  <td>1:16.309</td>
                </tr>
              </tbody>
            </table>
          </div>
		  </div>
		  </div>
		  
<?php include "includes/bottom.inc.php"; ?>