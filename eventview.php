<?php
    require('session.php');
    // require('slidebar.php');
    $phone_number = $_SESSION['account'];
    $sql = "SELECT * FROM events WHERE organizer_phone_number = $phone_number";
    $results = $conn->query($sql);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #recordeventTable {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 80%;
        margin-left: 10%;
        margin-top: 2%;
        }

        #recordeventTable td, #customers th {
        border: 1px solid #500000;
        padding: 8px;
        }

        #recordeventTable tr:nth-child(even){background-color: #f2f2f2;}

        #recordeventTable tr:hover {background-color: #C0C0C0;}

        #recordeventTable th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #880000;
        color: white;
        }

</style>

    </style>
</head>
<body>

    <table id="recordeventTable">
    <thead>
        
        <th>
            หมายเลขอีเว้น
        </th>
        <th>
            ชื่ออีเว้น
        </th>
        <th>
            สถานที่
        </th>
        <th>
            วัตถุประสงค์
        </th>
        <th>
            ระยะทาง
        </th>
        <th>
            สถานะ
        </th>
        <th>
            จำนวนผู้เข้าร่วม
        </th>
        <th>
            จำนวนที่รับ
        </th>
        <th>
            ราคา
        </th>
        <th>
            เบอร์ผู้จัด
        </th>
        <th>
            รูปภาพ
        </th>
        <th>
            แก้ไข
        </th>

    </thead>
    <tbody>

    <?php
         while($row = mysqli_fetch_array($results)){
              ?>
    
            <tr>

                <td><?=$row['event_id']?></td>
                <td><?=$row['event_name']?></td>
                <td><?=$row['location']?></td>
                <td><?=$row['objective']?></td>
                <td><?=$row['distance']?></td>
                <td><?=$row['status_event']?></td>
                <td><?=$row['number_of_participants']?></td>
                <td><?=$row['limit_number']?></td>
                <td><?=$row['price']?></td>
                <td><?=$row['organizer_phone_number']?></td>
                <td><img src="uploads/<?=$row['event_image']?>"  width="100px" height="100px"></td>
                <td><a href="eventedit.php?event_id=<?=$row['event_id']?>" class="submit-btn" style="color: black;">edit</a></td>

            </tr>
    <?php
         }
              ?>


    </tbody>
    </table>
</body>
</html>