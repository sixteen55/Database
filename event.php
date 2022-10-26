<?php
require('dbcon.php');
require('session.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the posted data
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

    // Prepare sql and bind parameters
    $sql = "INSERT INTO events(event_name, location, objective, distance, status_event, number_of_participants, limit_number, price, organizer_phone_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $statement = $conn->prepare($sql);
    $statement->bind_param('sssssssss', $event_name, $location, $objective, $distance, $status_event, $number_of_participants, $limit_number, $price, $organizer_phone_number);
    $result = $statement->execute();

    $sql2 = "SELECT * FROM events WHERE event_name = $event_name";
    $result2 = $conn->query($sql2);
    $row = $result2->fetch_assoc();
    $_SESSION['event_id'] = $row['event_id'];

    // Execute sql and check for failure
    if (!$result) {
        die('Execute failed: ' . $statement->error);
    }
else{
    if ($souvenir == "true"){
        header('Location: souvenirform.php');
    }
    else{
        header('Location: eventform.php');
    }
}
    exit();
}
?>