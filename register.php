<?php
require('dbcon.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the posted data
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    $user_check_query = "SELECT * FROM account WHERE phone_number = '$phone_number' OR email = '$email' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if phone number or email exists
            if ($result['phone_number'] === $phone_number) {
                $_SESSION['error'] = 'Phone number already exists!';
			    header('location: login-register.php');
            }
            if ($result['email'] === $email) {
                $_SESSION['error1'] = 'Email already exists!';
			    header('location: login-register.php');
            }
        }
    
    if (is_numeric($phone_number) == false){
        $_SESSION['error'] = 'Phone number must be numbers only!';
        header('Location: login-register.php');
    }

    // Prepare sql and bind parameters
    $sql = "INSERT INTO account(phone_number, password, email, fname, lname) VALUES (?, ?, ?, ?, ?)";
    $statement = $conn->prepare($sql);
    $statement->bind_param('issss', $phone_number, $password, $email, $fname, $lname);
    $result = $statement->execute();

        // Execute sql and check for failure
        if (!$result) {
        die('Execute failed: ' . $statement->error);
        }

        // Redirect
        $_SESSION['succeed'] = 'Register Succeed!';
        header('Location: login-register.php');
    
    exit();
}
?>