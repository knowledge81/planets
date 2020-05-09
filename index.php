<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Planets</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/planet.ico">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>

  <body>
    <?php
      include '/home/knowledge27/.function.php';

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      $planetname = $_POST['planetname'];
      $distancefromsun = $_POST['distancefromsun'];
      $radius = $_POST['radius'];
      $mass = $_POST['mass'];
      $lengthofday = $_POST['lengthofday'];
      $orbitalperiod = $_POST['orbitalperiod'];
      $maps = $_POST['maps'];
      $description = $_POST['description'];
    ?>
    <div class="container-fluid" style="background-color:black">
      <div class="container" style="background-color:#0000CC; color:white; text-align:center">
          <h1>Planets</h1>
          <h3>Please enter planet data for it to show on the table</h3>
      </div>
      <br>  
      <div class="container" style="backgroundcolor:black; color:white">
        <div class="row">
          <div class="table-responsive">
            <table class="table" style="color:white">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Planet Name</th>
                  <th>Distance from Sun</th>
                  <th>Radius</th>
                  <th>Mass</th>
                  <th>Length of Day</th>
                  <th>Orbital Period</th>
                  <th>Maps</th>
                  <th>Description</th>
                </tr>
              </thead>
              <?
                $sql = "SELECT * FROM planets";
                $result = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
              ?>
              <tbody>
                <tr>
                  <td><img src="images/<?=$row['planetname'];?>.jpeg" alt="planets" class="responsive" style="width:128px;height:128:px;"></td>
                  <td><?=$row['planetname'];?></td>
                  <td><?=$row['distancefromsun'];?></td>
                  <td><?=$row['radius'];?></td>
                  <td><?=$row['mass'];?></td>
                  <td><?=$row['lengthofday'];?></td>
                  <td><?=$row['orbitalperiod'];?></td>
                  <td><a href="http://<?=$row['maps'];?>" target="_blank" class="btn btn-primary">View</a></td>
                  <td><?=$row['description'];?></td>
                </tr>
              </tbody>
              <?
                }
                } else {
                    echo "0 results";
                }
                $conn->close();
              ?>
            </table> 
          </div>
        </div>
      </div>
    </div>
  </body>
</html>