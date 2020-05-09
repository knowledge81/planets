<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Planets</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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

      if(isset($_POST['submit'])) {
      
      $planetname = $_POST['planetname'];
      $distancefromsun = $_POST['distancefromsun'];
      $radius = $_POST['radius'];
      $mass = $_POST['mass'];
      $lengthofday = $_POST['lengthofday'];
      $orbitalperiod = $_POST['orbitalperiod'];
      $maps = $_POST['maps'];
      $description = $_POST['description'];
      
      $sql = "INSERT INTO planets (planetname, distancefromsun, radius, mass, lengthofday, orbitalperiod, maps, description)
      VALUES ('{$planetname}', '{$distancefromsun}', '{$radius}', '{$mass}', '{$lengthofday}', '{$orbitalperiod}', '{$maps}', '{$description}')";

      if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }
    ?>
   
    <div class="container-fluid" style="background-color:black">
      <div class="container" style="background-color:#0000CC; color:white; text-align:center">
          <h1>Planets</h1>
          <h3>Please enter planet data for it to show on the table</h3>
      </div>
      <br>  
    <div class="container" style="backgroundcolor:black; color:white">
      <form action="index.php" method="POST"> 
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="planetname">Planet Name:</label>
              <input type="planetname" class="form-control" id="planetname" name="planetname">
            </div>
            <div class="form-group">
              <label for="distancefromsun">Distance from Sun:</label>
              <input type="distancefromsun" class="form-control" id="distancefromsun" name="distancefromsun">
            </div>
            <div class="form-group">
              <label for="radius">Radius:</label>
              <input type="radius" class="form-control" id="radius" name="radius">
            </div>
            <div class="form-group">
              <label for="mass">Mass:</label>
              <input type="mass" class="form-control" id="mass" name="mass">
            </div>
            <div class="form-group">
              <label for="lengthofday">Length of Day:</label>
              <input type="lengthofday" class="form-control" id="lengthofday" name="lengthofday">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label for="orbitalperiod">Orbital Period:</label>
              <input type="orbitalperiod" class="form-control" id="orbitalperiod" name="orbitalperiod">
            </div>
            <div class="form-group">
              <label for="maps">Maps(Paste Your Google Maps Link Here):</label>
              <input type="maps" class="form-control" id="maps" name="maps">
            </div>
            <div class="form-group">
              <label for="description">Description:</label>
              <textarea class="form-control" rows="5" id="description" name="description"></textarea>
            </div>
            </div><br>
            <div class="form-group">
              <div class="col-lg-12" style="text-align:center">
                <input type="submit" name="submit" class="btn btn-primary">
              </div>
            </div>
          </div>
        </form><br>  
      </div>
      <div class="row">
        <table class="table" style="color:white">
          <thead>
            <tr>
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
              <td><?=$row['planetname'];?></td>
              <td><?=$row['distancefromsun'];?></td>
              <td><?=$row['radius'];?></td>
              <td><?=$row['mass'];?></td>
              <td><?=$row['lengthofday'];?></td>
              <td><?=$row['orbitalperiod'];?></td>
              <td><? if($_POST['maps']) {
                echo '<a href='.$maps.' target="_blank" class="btn btn-primary">View</a>';
                }
               ?>
              </td>
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
  </body>
</html>