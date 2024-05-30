<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Lelo</title>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
          rel="stylesheet">
</head>

<body>
<?php
include('header.php');
include('dbcalls/connect.php');
include('dbcalls/signup.php');


// Prepare and execute the query
$stmt = $conn->prepare("SELECT f.house_id, f.travel_cost, f.boarding_country, f.boarding_city, f.arrival_city, f.arrival_country, h.house_image AS image, h.summary, h.name
                        FROM flights f
                        JOIN house h ON f.house_id = h.house_id");
$stmt->execute();

$flights = $stmt->fetchAll();
?>

<main style="background-image: url('assets/img/background.png');">
    <section class="reizoekenhomepagina" style="background-image: url('assets/img/vliegtuigfoto.png');">
        <h1>Plan je reis hier</h1>
        <div class="reiszoeken">
            <form class="formulierhome">
                <input type="text" name="bestemming" placeholder="bestemming" id="vakantieformulier">
                <input type="text" name="daterange"/>
                <div class="drop">
                    <input class="hoeveelpers" readonly="" placeholder="personen" id="vakantiepers">
                    <div class="personenetoevoegen">

                        <div class="keuzepers">
                            <label for="adults">Volwassenen:</label>
                            <input type="number" id="volwassenen" class="pers" min="0" value="0">
                        </div>
                        <div class="keuzepers">
                            <label for="children">Kinderen:</label>
                            <input type="number" id="kinderen" class="pers" min="0" value="0">
                        </div>
                        <div class="keuzepers">
                            <label for="babies">Baby's:</label>
                            <input type="number" id="baby" class="pers" min="0" value="0">
                        </div>
                    </div>
                </div>
                <input type="text" name="luchthaven" placeholder="luchthaven" id="vakantieformulier">

                <input type="image" src="assets/img/zoeken.png" alt="Submit" value="zoeken" id="zoekenhome">
            </form>
        </div>
    </section>
    <section class="voorgesteldereizen">
        <?php foreach ($flights as $flight) : ?>
            <div class="flight-item">
                <div class="flight-image">
                    <img src="<?php echo $flight['image']; ?>" alt="House Image" style="max-width: 100%; height: auto;">
                </div>


                <div class="tekstinfoblok">
                    <div class="naamkosteninfoblok">
                        <div class="flight-departure" id="nameblokinfo"><?php echo $flight['name']; ?></div>
                        <div class="flight-departure" id="prijsblokinfo">prijs
                            p.p: <?php echo $flight['travel_cost']; ?></div>

                    </div>
                    <div class="dingenbekijkeninfoblok">
                        <div class="flight-departure"
                             style="text-wrap: wrap; width: 115px;"> <?php echo $flight['summary']; ?></div>
                        <form action="gevondenreis.php" method="get">
                            <input type="hidden" name="house_id" value="<?php echo $flight['house_id'] ?>">
                            <input type="submit" value="Bekijk reis" id="">
                        </form>
                    </div>
                </div>

            </div>


        <?php endforeach; ?>
    </section>

</main>
<script>
    $(function () {
        $('input[name="daterange"]').daterangepicker({
            ssingleDatePicker: 'true',
            showShortcuts: 'false',
            showTopbar: 'false'
        });
    });
</script>
<?php
include('footer.php')
?>
</body>

</html>