<?php
require('dbcon.php');
require('session.php');
$phone_number = $_SESSION['account'];
if (!isset($_SESSION['account'])){
    $_SESSION['error'] = 'You must log in first!';
    header('location: login-register.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="event-souvenir.css">
    <title>CreateEvent</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <form action="event.php" method="POST" enctype="multipart/form-data">
                    <div class="souvenir" style="color: white;">Event</div>
                    <div class="text-left justify-content-center align-items-center p-4 border-2 border-dashed rounded-0">
                        <input type="event_name" class="input-field" name="event_name" placeholder="Eventname" required>
                        <input type="location" class="input-field" name="location" placeholder="location" required>
                        <input type="text" class="input-field" name="organizer_phone_number" value="<?php echo $phone_number ?>" disabled>
                        <input type="objective" class="input-field" name="objective" placeholder="Objective" required>
                        <input type="distance" class="input-field" name="distance" placeholder="Distance" required>
                        <input type="limit_number" class="input-field" name="limit_number" placeholder="Limit number" required>
                        <input type="price" class="input-field" name="price" placeholder="Price" required>
                        <input type="file" name="file" class="form-control streched-link" accept="image/gif, image/jpeg, image/png">
                        <p class="small mb-0 mt-2"><b>Note:</b> Only JPG, JPEG, PNG & GIF files are allowed to upload</p>
                        <input type="checkbox" class="chech-box2" id="true" name="souvenir" value="true">
                        <label for="sovenir"><span>Souvenir</span></label><br>
                    </div>
                    <div class="d-sm-flex justify-content-end mt-2">
                        <input type="submit" name="submit" value="Submit" class="btn btn-sm btn-danger mb-3"> 
                        <a href= "eventform.php" class="btn btn-sm btn-default mb-3">back</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <?php  if (!empty($_SESSION['statusMsg'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php 
                        echo $_SESSION['statusMsg']; 
                        unset($_SESSION['statusMsg']);
                    ?>
                </div>
            <?php } ?>
        </div>
    </div>
    
</body>
</html>