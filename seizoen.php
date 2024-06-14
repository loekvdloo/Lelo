<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lelo</title>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    session_start();
    include('header.php');
    include('dbcalls/connect.php');
    include('dbcalls/signup.php');
    include('dbcalls/search.php');

    $season = $_GET['seizoen'];
    switch ($season) {
        case 'lente':
            $sql = '
                SELECT h.*, AVG(r.rating) as rating 
                FROM house h
                LEFT JOIN reviews r ON h.house_id = r.house_id 
                WHERE MONTH(travel_date) IN (3, 4, 5) 
                GROUP BY h.house_id';
            break;
        case 'zomer':
            $sql = '
                SELECT h.*, AVG(r.rating) as rating 
                FROM house h
                LEFT JOIN reviews r ON h.house_id = r.house_id 
                WHERE MONTH(travel_date) IN (6, 7, 8) 
                GROUP BY h.house_id';
            break;
        case 'herfst':
            $sql = '
                SELECT h.*, AVG(r.rating) as rating 
                FROM house h
                LEFT JOIN reviews r ON h.house_id = r.house_id 
                WHERE MONTH(travel_date) IN (9, 10, 11) 
                GROUP BY h.house_id';
            break;
        case 'winter':
            $sql = '
                SELECT h.*, AVG(r.rating) as rating 
                FROM house h
                LEFT JOIN reviews r ON h.house_id = r.house_id 
                WHERE MONTH(travel_date) IN (12, 1, 2) 
                GROUP BY h.house_id';
            break;
        default:

            break;
    }

    $review_stmt = $conn->prepare($sql);
    $review_stmt->execute();
    $houses = $review_stmt->fetchAll();

    $review_count_stmt = $conn->prepare("SELECT COUNT(DISTINCT country) AS country FROM house");
    $review_count_stmt->execute();
    $review_count_data = $review_count_stmt->fetch();
    $review_count = $review_count_data['country'];
    ?>

    <main style="background-image: url('assets/img/background.png');">


        <section class="reizoekenhomepagina" style="background-image: url('assets/img/vliegtuigfoto.png');">
            <div class="tekstindexfoto">
                <h1>Plan je reis hier</h1>
                <h3>We hebben reizen naar verschillende landen waar wij reizen aanbieden.</h3>
            </div>
            <div class="reiszoeken">
                <!-- Form for searching by date -->
                <form class="formulierhome" method="GET" action="search.php">
                    <input type="date" name="search_query" placeholder="Zoek op maand (YYYY-MM-DD)" id="vakantieformulier">
                    <input type="text" name="search_query" placeholder="Zoek op land" id="vakantieformulier">
                    <input type="submit" value="Zoeken" id="zoekenhome">
                </form>
            </div>
        </section>


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
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                singleDatePicker: true,
                showShortcuts: false,
                showTopbar: false
            });
        });
    </script>
    <?php include('footer.php'); ?>
</body>

</html>