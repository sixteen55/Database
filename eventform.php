<?php
require('dbcon.php');
require('session.php');
$phone_number = $_SESSION['account'];
?>
<html>
<head>
    <title>Event Form</title>
    <link rel="stylesheet" href="event-souvenir.css">
</head>
<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <button type="button" class="title" style="color: white;">Event</button>
            </div>
                <form class="input-group" action="event.php" method="post">
                    <input type="event_name" class="input-field" name="event_name" placeholder="Eventname" required>
                    <input type="location" class="input-field" name="location" placeholder="location" required>
                    <input type="text" class="input-field" name="organizer_phone_number" value="<?php echo $phone_number ?>" disabled>
                    <input type="objective" class="input-field" name="objective" placeholder="Objective" required>
                    <input type="distance" class="input-field" name="distance" placeholder="Distance" required>
                    <input type="limit_number" class="input-field" name="limit_number" placeholder="Limit number" required>
                    <input type="price" class="input-field" name="price" placeholder="Price" required>
                    <input type="checkbox" class="chech-box2" id="true" name="souvenir" value="true">
                    <label for="sovenir"><span>Souvenir</span></label><br>
                    <button type="submit" class="submit-btn" style="color: white;">Create event</button>
                </form>
        </div>
    </div>
</body>
</html>