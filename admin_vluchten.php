<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lelo</title>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    session_start();
    include('header.php');
    include('dbcalls/booked_travels.php');
    include('dbcalls/connect.php');
    ?>
    <main class="mainadmin" style="background-image: url('assets/img/background.png');">

    <table border="1">
        <tr>
            <th>Flight ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Departure Date</th>
            <th>Return Date</th>
            <th>Auto</th>
            <th>Plane</th>
            <th>Persons</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($records as $record) : ?>
            <tr>
                <form method="post" action="dbcalls/booked_travels.php" style="display:contents;">
                    <td><?php echo $record['flight_id']; ?>
                        <input type="hidden" name="flight_id" value="<?php echo $record['flight_id']; ?>">
                        <input type="hidden" name="house_id" value="<?php echo $record['house_id']; ?>">
                    </td>
                    <td><input type="text" name="fname" value="<?php echo $record['fname']; ?>"></td>
                    <td><input type="text" name="lname" value="<?php echo $record['lname']; ?>"></td>
                    <td><input type="text" name="email" value="<?php echo $record['email']; ?>"></td>
                    <td><input type="text" name="phone" value="<?php echo $record['phone']; ?>"></td>
                    <td><input type="text" name="departure_date" value="<?php echo $record['departure_date']; ?>"></td>
                    <td><input type="text" name="return_date" value="<?php echo $record['return_date']; ?>"></td>
                    <td><input type="checkbox" name="auto" value="1" <?php if ($record['auto']) echo 'checked'; ?>></td>
                    <td><input type="checkbox" name="plane" value="1" <?php if ($record['plane']) echo 'checked'; ?>></td>
                    <td><input type="text" name="persons" value="<?php echo $record['persons']; ?>"></td>
                    <td>
                        <input type="submit" name="update" value="Update">
                        <input type="submit" name="delete" value="Delete">
                    </td>
                </form>
            </tr>
        <?php endforeach; ?>
    </table>

    </main>
    <?php
    include('footer.php');
    ?>
</body>

</html>
