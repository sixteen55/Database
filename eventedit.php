<?php
    require('dbcon.php');
    require('session.php');
    require('header.php');

    $phone_number = $_SESSION['account'];
    $event_id = $_GET['event_id'];
    $sql = "SELECT * FROM events WHERE event_id='$event_id'";
    $results = $conn->query($sql);
    $row = $results->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event_name = $_POST['event_name'];
    $location = $_POST['location'];
    $objective = $_POST['objective'];
    $distance = $_POST['distance'];
    $limit_number = $_POST['limit_number'];
    $price = $_POST['price'];

    
    $sql3 = "UPDATE events SET event_name = ? , location = ? , objective = ? , distance = ?, limit_number = ?, price = ? WHERE event_id = ?";
    $statement = $conn->prepare($sql3);
    $statement->bind_param('ssssssi', $event_name, $location , $objective , $distance , $limit_number, $price, $event_id);
    $res = $statement->execute();
    
    if (!$res) {
        die('Execute failed: ' . $statement->error);
    }
    // Redirect
    header('Location: eventview.php');
        
    exit();
        
}   
?>
<html>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #fff;
  text-align: left;
  padding: 5px;
}

tr:nth-child(even) {
  background-color: #fff;
}
</style>
<head>
</head>
    <body>
    <h2>Event</h2>
      <table class="table table" style="margin-top: 20px">
        <form method="post" class="form">
        <input type="submit" class="btn btn-success pull-right" value="บันทึกการแก้ไข">
            <tbody>
                <div class="form-group">
                    <th>Eventname :</th>
                    <th><input type="text" class="form-control" name="event_name" value="<?php echo $row['event_name']?>"></th>
                    </tr>
                </div>
            <tr>
                <div class="form-group">
                    <th>location :</th>
                    <th><input type="text" class="form-control" name="location" value="<?php echo $row['location']?>"></th>
                    </tr>
                </div>
            <div class="form-group">
                    <th>Objective :</th>
                    <th><input type="text" class="form-control" name="objective" value="<?php echo $row['objective']?>"></th>
                    </tr>
                </div>
            <div class="form-group">
                    <th>Distance :</th>
                    <th><input type="text" class="form-control" name="distance" value="<?php echo $row['distance']?>"></th>
                    </tr>
            </div>
            <div class="form-group">
                    <th>Limitnumber :</th>
                    <th><input type="text" class="form-control" name="limit_number" value="<?php echo $row['limit_number']?>"></th>
                    </tr>
            </div>
            <div class="form-group">
                    <th>Price :</th>
                    <th><input type="text" class="form-control" name="price" value="<?php echo $row['price']?>"></th>
                    </tr>
            </div>
            </tbody>
              </td><br>
              
        </form>
        </table>
    </div>
<div class="d-sm-flex justify-content-end mt-2" style="margin-left: 960px;">
    <a href= "eventview.php" class="btn btn-sm btn-default mb-3" style="margin-left: 130px;">back</a>
</div>

<?php
// require('footer.php');
?>
</body>
</html>