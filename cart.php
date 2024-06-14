<?php
session_start();
include('header.php');
include('dbcalls/connect.php');

// Fetch houses that the user has added to their cart
try {
    $stmt = $conn->prepare("
    SELECT 
        h.*, 
        AVG(r.rating) AS rating
    FROM 
        house h
    LEFT JOIN 
        reviews r ON h.house_id = r.house_id
    INNER JOIN 
        cart c ON h.house_id = c.house_id
    WHERE 
        c.user_id = :user_id
    GROUP BY 
        h.house_id
    ");
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    $stmt->execute();
    $houses = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error fetching cart data: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Cart Houses</title>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>
</head>
<body>
<main style="background-image: url('assets/img/background.png');">
    <section class="voorgesteldereizen">
        <?php foreach ($houses as $house) : ?>
            <div class="flight-item">
                <div class="flight-image">
                    <img src="<?php echo htmlspecialchars($house['house_image']); ?>" alt="House Image" class="huisimg">
                </div>
                <div class="tekstinfoblok">
                    <div class="naamkosteninfoblok">
                        <div class="flight-departure" id="nameblokinfo">
                            <h3><?php echo htmlspecialchars($house['name']); ?></h3>
                            <?php
                            $rating = round($house['rating']);
                            switch ($rating) {
                                case 1:
                                    echo '<img src="assets/img/1_star.png" alt="1ster" class="hoi">';
                                    break;
                                case 2:
                                    echo '<img src="assets/img/2_star.png" alt="2ster" class="hoi">';
                                    break;
                                case 3:
                                    echo '<img src="assets/img/3_star.png" alt="3ster" class="hoi">';
                                    break;
                                case 4:
                                    echo '<img src="assets/img/4_star.png" alt="4ster" class="hoi">';
                                    break;
                                case 5:
                                    echo '<img src="assets/img/5_stars.png" alt="5ster" class="hoi">';
                                    break;
                            }
                            ?>
                        </div>
                        <div class="flight-departure" id="prijsblokinfo">
                            prijs p.p: <?php echo htmlspecialchars($house['price']); ?>
                        </div>
                    </div>
                    <div class="dingenbekijkeninfoblok">
                        <div class="flight-departure" style="text-wrap: wrap; width: 115px;">
                            <?php echo htmlspecialchars($house['summary']); ?>
                        </div>
                        <form action="gevondenreis.php" method="get">
                            <input type="hidden" name="house_id" value="<?php echo htmlspecialchars($house['house_id']); ?>">
                            <input type="submit" value="Bekijk reis" id="bekijkvoorgesteld">
                        </form>
                    </div>
                    <div class="action-buttons">
                        <button onclick="document.getElementById('id04-<?php echo $house['house_id']; ?>').style.display='block'">boek de reis</button>
                        <form action="remove.php" method="post">
                            <input type="hidden" name="house_id" value="<?php echo htmlspecialchars($house['house_id']); ?>">
                            <button type="submit" class="delete-button">Verwijder uit winkelwagen</button>
                        </form>
                    </div>

                    <div id="id04-<?php echo $house['house_id']; ?>" class="modal">
                        <form class="modal-content animate" action="dbcalls/book_flight.php" method="post">
                            <div class="imgcontainer">
                                <span onclick="document.getElementById('id04-<?php echo $house['house_id']; ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
                                <img src="assets/img/logo.png" alt="Avatar" class="avatar">
                            </div>
                            <div class="container">
                                <label for="fname"><b>Voornaam</b></label>
                                <input type="text" placeholder="Voornaam" id="reseveren" name="fname" required>

                                <label for="lname"><b>Achternaam</b></label>
                                <input type="text" placeholder="Achternaam" name="lname" required>

                                <label for="email"><b>E-Mail</b></label>
                                <input type="email" placeholder="E-Mail" name="email" required>

                                <label for="phone"><b>Telefoonnummer</b></label>
                                <input type="tel" placeholder="Telefoonnummer" name="phone" required>

                                <label for="persons"><b>Aantal Personen</b></label>
                                <input type="number" placeholder="persons" name="persons" required>

                                <label for="departure_date"><b>Vertrekdatum</b></label>
                                <input type="date" id="datumreseveren" name="departure_date" required>

                                <label for="return_date"><b>Terugkomdatum</b></label>
                                <input type="date" class="datumreseveren" name="return_date" required>

                                <div id="extraoptieauto">
                                    <input type="checkbox" name="auto">
                                    <label for="auto">Auto</label>
                                </div>

                                <div class="vliegtuigvinkje">
                                    <input type="checkbox" id="myCheck-<?php echo $house['house_id']; ?>" name="plane" onclick="myFunction('<?php echo $house['house_id']; ?>')">
                                    <label for="myCheck-<?php echo $house['house_id']; ?>">Vliegtuig</label>
                                </div>

                                <script>
                                    function myFunction(houseId) {
                                        var checkBox = document.getElementById("myCheck-" + houseId);
                                        var dateFields = document.getElementById("dateFields-" + houseId);
                                        if (checkBox.checked == true) {
                                            dateFields.style.display = "block";
                                        } else {
                                            dateFields.style.display = "none";
                                        }
                                    }
                                </script>

                                <!-- Hidden input field for house_id -->
                                <input type="hidden" name="house_id" value="<?php echo htmlspecialchars($house['house_id']); ?>">

                                <button type="submit">Reseveren</button>
                            </div>
                            <div class="container" style="background-color:#f1f1f1">
                                <button type="button" onclick="document.getElementById('id04-<?php echo $house['house_id']; ?>').style.display='none'" class="cancelbtn">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</main>

<script>
    // Get the modal
    var modals = document.querySelectorAll('.modal');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        modals.forEach(function(modal) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        });
    }
</script>

<?php
include('footer.php');
?>
</body>
</html>
