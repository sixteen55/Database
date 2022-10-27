<?php
    require('dbcon.php');
    require('session.php');
    require('header.php');

    $phone_number = $_SESSION['account'];
    $sql = "SELECT * FROM account WHERE phone_number='$phone_number'";
    $results = $conn->query($sql);
    $row = $results->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $password = $_POST['password'];
        $email = $_POST['email'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
    
        $sql1 = "UPDATE account SET password = ? , email = ? , fname = ? , lname = ? WHERE phone_number = ?";
        $statement = $conn->prepare($sql1);
        $statement->bind_param('ssssi', $password, $email , $fname , $lname , $phone_number);
        $res = $statement->execute();
    
        if (!$res) {
             die('Execute failed: ' . $statement->error);
        }
        // Redirect
        header('Location: profile.php');
        
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
    <h2>Profile</h2>
      <table class="table table" style="margin-top: 20px">
        <form method="post" class="form">
        <input type="submit" class="btn btn-success pull-right" value="บันทึกการแก้ไข">
            <tbody>
                <div class="form-group">
                    <th>Phone number :</th>
                    <th><input type="text" class="form-control" name="phone_number" value="<?php echo $row['phone_number']?>" disabled></th>
                    </tr>
                </div>
            <tr>
                <div class="form-group">
                    <th>Password :</th>
                    <th><input type="text" class="form-control" name="password" value="<?php echo $row['password']?>"></th>
                    </tr>
                </div>
            <div class="form-group">
                    <th>Email :</th>
                    <th><input type="text" class="form-control" name="email" value="<?php echo $row['email']?>"></th>
                    </tr>
                </div>
            <div class="form-group">
                    <th>Firstname :</th>
                    <th><input type="text" class="form-control" name="fname" value="<?php echo $row['fname']?>"></th>
                    </tr>
            </div>
            <div class="form-group">
                    <th>Lastname :</th>
                    <th><input type="text" class="form-control" name="lname" value="<?php echo $row['lname']?>"></th>
                    </tr>
            </div>
            </tbody>
              </td><br>
              
        </form>
        </table>
    </div>

<?php
// require('footer.php');
?>
</body>
</html>