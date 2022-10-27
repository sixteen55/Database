<?php 
require('session.php');
include_once 'dbcon.php';
$event_id = $_SESSION['event_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="event-souvenir.css">
    <title>Souvenir</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <form action="souvenir.php" method="POST" enctype="multipart/form-data">
                    <div class="souvenir" style="color: white;">Souvenir</div>
                    <div class="text-left justify-content-center align-items-center p-4 border-2 border-dashed rounded-0">
                        <input type="text" class="input-field" name="souvenir_name" placeholder="Souvenirname" required>
                        <input type="text" class="input-field" name="price" placeholder="Price" required>
                        <input type="text" class="input-field" name="details" placeholder="Details" required>
                        <input type="text" class="input-field" name="event_id" value="<?php echo $event_id ?>"disabled required>
                        <input type="file" name="file" class="form-control streched-link" accept="image/gif, image/jpeg, image/png">
                        <p class="small mb-0 mt-2"><b>Note:</b> Only JPG, JPEG, PNG & GIF files are allowed to upload</p>
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