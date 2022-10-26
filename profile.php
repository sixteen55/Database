<?php
    require('dbcon.php');
    require('header.php');
    require('navbar.php');
    require('session.php');

    $phone_number = $_SESSION['account'];
    $sql = "SELECT * FROM account WHERE phone_number='$phone_number'";
    $results = $conn->query($sql);
    ?>
<html>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 5px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
    <head>
</head>
    <body>
    <h2>Profile</h2>
    <a href="profileedit.php" class="btn btn-warning pull-right" role="button">แก้ไข</a>
      <table class="table table" style="margin-top: 20px">
        <?php
         while($row = $results->fetch_assoc()){
              ?>
              <tbody>
            <tr>
                <th>Phone number :</th>
                <td><?php echo $row['phone_number'] ?></th>
            </tr>
            <tr>
                <th>Password :</td>
                <td><?php echo $row['password'] ?></td>
            </tr>
            <tr>
                <th>Email :</td>
                <td><?php echo $row['email'] ?></td>
            </tr>
            <tr>
                <th>Firstname :</td>
                <td><?php echo $row['fname'] ?></td>
            </tr>
            <tr>
                <th>Lastname :</td>
                <td><?php echo $row['lname'] ?></td>
            </tr>
            <tr>
                <th>Role :</td>
                <td><?php echo $row['roll'] ?></td>
            </tr>
        </tbody>
              </td><br>
              
              <?php
            } 
            ?>
              </table>
    </div>

<?php
// require('footer.php');
?>
</body>
</html>