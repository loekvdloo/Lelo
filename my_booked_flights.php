<?php
session_start();
include('dbcalls/connect.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Check if cancellation form is submitted
if (isset($_POST['cancel_flight'])) {
    $flight_id_to_cancel = $_POST['flight_id_to_cancel'];

    // Perform cancellation logic (you need to implement this)
    // For example, you might want to delete the flight from booked_flights table
    $stmt_cancel = $conn->prepare("DELETE FROM booked_flights WHERE flight_id = :flight_id AND user_id = :user_id");
    $stmt_cancel->bindParam(':flight_id', $flight_id_to_cancel);
    $stmt_cancel->bindParam(':user_id', $user_id);
    $stmt_cancel->execute();
    // Optionally, you may want to add additional logic here (like handling errors or success messages)
}

// Query to fetch booked flights and associated house information for the current user
$stmt = $conn->prepare("
    SELECT bf.*, h.country AS house_country, h.city AS house_city, h.name AS house_name, h.summary AS house_summary, h.rooms AS house_rooms, h.pool AS house_pool, h.backyard AS house_backyard, h.airco AS house_airco, h.sauna AS house_sauna
    FROM booked_flights bf
    INNER JOIN house h ON bf.house_id = h.house_id
    WHERE bf.user_id = :user_id
");
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$booked_flights = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch booked houses for the current user
$stmt_houses = $conn->prepare("
    SELECT h.name AS house_name, h.summary AS house_summary, h.rooms AS house_rooms, h.pool AS house_pool, h.backyard AS house_backyard, h.airco AS house_airco, h.sauna AS house_sauna
    FROM booked_flights bf
    INNER JOIN house h ON bf.house_id = h.house_id
    WHERE bf.user_id = :user_id
");
$stmt_houses->bindParam(':user_id', $user_id);
$stmt_houses->execute();
$booked_items = $stmt_houses->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Booked Flights and Houses</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script>
        function confirmCancel() {
            return confirm("Are you sure you want to cancel this flight?");
        }
    </script>
</head>

<body>
    <?php include('header.php'); ?>

    <main class="mainadmin" style="background-image: url('assets/img/background.png');">
        <h2>My Booked Flights</h2>

        <table border="1">
            <tr>
                <th>Land</th>
                <th>Stad</th>
                <th>Vertrek Datum</th>
                <th>Terugkom Datum</th>
                <th>Personen</th>
                <th>Vlucht inbegrepen</th>
                <th>Anuleren</th>
            </tr>
            <?php foreach ($booked_flights as $flight) : ?>
                <tr>
                    <td><?php echo $flight['house_country']; ?></td>
                    <td><?php echo $flight['house_city']; ?></td>
                    <td><?php echo $flight['departure_date']; ?></td>
                    <td><?php echo $flight['return_date']; ?></td>
                    <td><?php echo $flight['persons']; ?></td>
                    <td><?php echo $flight['plane'] ? 'Yes' : 'No'; ?></td>
                    <td>
                        <form method="post" action="">
                            <input type="hidden" name="flight_id_to_cancel" value="<?php echo $flight['flight_id']; ?>">
                            <button type="submit" name="cancel_flight" onclick="return confirmCancel();">Annuleer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h3>Booked Houses</h3>
        <table border="1">
            <tr>
                <th>Naam huis</th>
                <th>Samenvatting huis</th>
                <th>Kamers</th>
                <th>Zwembad</th>
                <th>Achtertuin</th>
                <th>Airco</th>
                <th>Sauna</th>
            </tr>
            <?php foreach ($booked_items as $item) : ?>
                <tr>
                    <td><?php echo $item['house_name']; ?></td>
                    <td><?php echo $item['house_summary']; ?></td>
                    <td><?php echo $item['house_rooms']; ?></td>
                    <td><?php echo $item['house_pool'] ? 'Yes' : 'No'; ?></td>
                    <td><?php echo $item['house_backyard'] ? 'Yes' : 'No'; ?></td>
                    <td><?php echo $item['house_airco'] ? 'Yes' : 'No'; ?></td>
                    <td><?php echo $item['house_sauna'] ? 'Yes' : 'No'; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </main>

    <?php include('footer.php'); ?>
</body>

</html>
