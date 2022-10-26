<?php 

require('session.php');
include_once 'dbcon.php';

// File upload path
$targetDir = "uploads/";

if (isset($_POST['submit'])) {
    if (!empty($_FILES["file"]["name"])) {
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $souvenir_name = $_POST['souvenir_name'];
        $price = $_POST['price'];
        $details = $_POST['details'];
        $event_id = $_SESSION['event_id'];

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                $insert = $conn->query("INSERT INTO souvenir(souvenir_name, price, souvenir_image, details, event_id) VALUES ('$souvenir_name', '$price', '$fileName', '$details', '$event_id')");
                if ($insert) {
                    $_SESSION['statusMsg'] = "The file <b>" . $fileName . "</b> has been uploaded successfully.";
                    header("location: souvenirform.php");
                } else {
                    $_SESSION['statusMsg'] = "File upload failed, please try again.";
                    header("location: souvenirform.php");
                }
            } else {
                $_SESSION['statusMsg'] = "Sorry, there was an error uploading your file.";
                header("location: souvenirform.php");
            }
        } else {
            $_SESSION['statusMsg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.";
            header("location: souvenirform.php");
        }
    } else {
        $_SESSION['statusMsg'] = "No souvenir.";
        header("location: souvenirform.php");
    }
}

?>