<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Lelo</title>
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
include('dbcalls/search.php');

$stmt = $conn->prepare("
SELECT 
    h.*, 
    f.travel_cost, 
    f.boarding_country, 
    f.boarding_city, 
    f.arrival_city, 
    f.arrival_country, 
    AVG(r.rating) AS rating
FROM 
    house h
LEFT JOIN 
    flights f ON f.house_id = h.house_id
LEFT JOIN 
    reviews r ON h.house_id = r.house_id
GROUP BY 
    h.house_id
");
$flights = $stmt->fetchAll();


$review_count_stmt = $conn->prepare("SELECT COUNT(*) AS country FROM locations");
$review_count_stmt->execute();
$review_count_data = $review_count_stmt->fetch();
$review_count = $review_count_data['country'];



$land = isset($_GET['land']) ? $_GET['land'] : ''; //Fetch country to know which to print
$stmt = $conn->prepare('SELECT * FROM locations WHERE country = :country');
$stmt->bindParam(':country', $land);
$stmt->execute();
$countryData = $stmt->fetch();
$locationId = $countryData['country'];
$stmtHouses = $conn->prepare('SELECT * FROM house WHERE country = :country');
$stmtHouses->bindParam(':country', $land);
$stmtHouses->execute();
$houses = $stmtHouses->fetchAll();

?>

<main style="background-image: url('assets/img/background.png');">
    <section class="reizoekenhomepagina" style="background-image: url('assets/img/vliegtuigfoto.png');">
        <div class="tekstindexfoto">
            <h1>Plan je reis hier</h1>
            <h3>we hebben reizen naar <?php echo htmlspecialchars($review_count); ?> verschillende landen waar wij reizen aanbieden</h3>
        </div>
        <div class="reiszoeken">
            <form class="formulierhome" method="GET" action="search.php">
                <input type="text" name="bestemming" placeholder="bestemming" id="vakantieformulier">
                <input class="hoeveelpers" type="number" name="persons" placeholder="personen" id="vakantiepers" min="1" step="1">
                <select name="luchthaven" id="vakantieformuliervlucht">
                    <option value="schiphol">Schiphol</option>
                    <option value="lelystad">Lelystad</option>
                    <option value="Hartsfield-Jackson Atlanta">Hartsfield-Jackson Atlanta</option>
                    <option value="Beijing Capital ">Beijing Capital</option>
                    <option value="Los Angeles">Los Angeles</option>
                    <option value="Dubai">Dubai</option>
                    <option value="Tokyo Haneda">Tokyo Haneda</option>
                    <option value="O'Hare ">O'Hare</option>
                    <option value="London Heathrow ">London Heathrow</option>
                    <option value="Shanghai Pudong ">Shanghai Pudong</option>
                    <option value="Paris Charles de Gaulle ">Paris Charles de Gaulle</option>
                    <option value="Dallas/Fort Worth">Dallas/Fort Worth</option>
                    <option value="Guangzhou Baiyun ">Guangzhou Baiyun</option>
                    <option value="Frankfurt">Frankfurt</option>
                    <option value="Istanbul ">Istanbul</option>
                    <option value="Singapore Changi ">Singapore Changi</option>
                    <option value="Amsterdam Schiphol">Amsterdam Schiphol</option>
                    <option value="Seoul Incheon ">Seoul Incheon</option>
                    <option value="Denver ">Denver</option>
                    <option value="Suvarnabhumi ">Suvarnabhumi</option>
                    <option value="Hong Kong ">Hong Kong</option>
                    <option value="Madrid-Barajas">Madrid-Barajas</option>
                </select>

                <input type="image" src="assets/img/zoeken.png" alt="Submit" value="zoeken" id="zoekenhome">
            </form>
        </div>
    </section>
    <section class="voorgesteldereizen">
        <?php foreach ($houses as $house) : ?>
            <div class="flight-item">
                <div class="flight-image">
                    <img src="<?php echo $house['house_image']; ?>" alt="House Image" class="huisimg">
                </div>

                <div class="tekstinfoblok">
                    <div class="naamkosteninfoblok">
                        <div class="flight-departure" id="nameblokinfo">
                            <h3><?php echo $house['country']; ?>, <?php echo $house['city']; ?></h3>


                            <h3><?php echo $house['name']; ?></h3>

                        </div>
                        <div class="flight-departure" id="prijsblokinfo">
                            <?php
                            switch ($house['rating']) {
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
                            <p class="prijsvoorgesteldreizen">prijs p.p: <?php echo $house['price']; ?></p>
                        </div>
                    </div>
                    <div class="dingenbekijkeninfoblok">
                        <div class="flight-departure" style="text-wrap: wrap; width: 115px;">
                            <?php echo $house['summary']; ?>
                        </div>
                        <form action="gevondenreis.php" method="get">
                            <input type="hidden" name="house_id" value="<?php echo $house['house_id'] ?>">
                            <input type="submit" value="Bekijk reis" id="bekijkvoorgesteld">
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