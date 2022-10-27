<?php
require('dbcon.php');
require('session.php');

$targetDir = "uploads/";

if (isset($_POST['submit'])) {
    if (!empty($_FILES["file"]["name"])) {
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $event_name = $_POST['event_name'];
        $location = $_POST['location'];
        $organizer_phone_number  = $_SESSION['account'];
        $objective = $_POST['objective'];
        $distance = $_POST['distance'];
        $limit_number = $_POST['limit_number'];
        $price = $_POST['price'];
        $status_event = false;
        $number_of_participants = 0;
        $souvenir = $_POST['souvenir'];

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                $insert = $conn->query("INSERT INTO events(event_name, location, objective, distance, status_event, number_of_participants, limit_number, price, organizer_phone_number, event_image) VALUES ('$event_name', '$location', '$objective', '$distance', '$status_event', '$number_of_participants', '$limit_number', '$price', '$organizer_phone_number', '$fileName')");
                
                $sql2 = "SELECT * FROM events WHERE event_name = '$event_name'";
                $result2 = $conn->query($sql2);
                $row = $result2->fetch_assoc();
                $_SESSION['event_id'] = $row['event_id'];
                
                if ($insert) {
                    $_SESSION['statusMsg'] = "Create event succeed.";
                    header("location: eventform.php");
                } else {
                    $_SESSION['statusMsg'] = "File upload failed, please try again.";
                    header("location: eventform.php");
                }
            } else {
                $_SESSION['statusMsg'] = "Sorry, there was an error uploading your file.";
                header("location: eventform.php");
            }
        } else {
            $_SESSION['statusMsg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.";
            header("location: eventform.php");
        }

    } else {
        $_SESSION['statusMsg'] = "Please upload image.";
        header("location: eventform.php");
    } 
    
    if ($souvenir == "true"){
        header('Location: souvenirform.php');
    }
    else{
        header('Location: eventform.php');
    }
    
} 
?>