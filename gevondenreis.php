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

$house_id = $_GET['house_id'];

try {
    $stmt = $conn->prepare("
        SELECT house.*, flights.travel_cost 
        FROM house 
        LEFT JOIN flights ON house.house_id = flights.house_id 
        WHERE house.house_id = :house_id
    ");
    $stmt->bindParam(':house_id', $house_id);
    $stmt->execute();
    $data = $stmt->fetch();
} catch (PDOException $e) {
    echo "Fout met Pagina laden: " . $e->getMessage();
}
?>

<main style="background-image: url('assets/img/background.png');">
    <section class="bevoegdhedenverblijf">
        <div class="bevoegdheaden">
            <h2>bevoegdheden</h2>
            <div class="fasaliteiten">
                <p id="rooms"><?php echo($data['rooms']) ?><img src="assets/img/kamers.png" class="logobevoegheden"
                                                                alt="kamers">Rooms</>
                <p><?php echo ($data['pool']) ? '<img src="assets/img/vink.png" alt="vink" width=20 height=20 >' : '<img src="assets/img/cross.png" alt="kruis" width=20 height=20 >' ?>
                    <img src="assets/img/zwembad.png" class="logobevoegheden" alt="zwembad">Pool
                </p>
                <p><?php echo ($data['backyard']) ? '<img src="assets/img/vink.png" alt="vink" width=20 height=20 >' : '<img src="assets/img/cross.png" alt="kruis" width=20 height=20 >' ?>
                    <img src="assets/img/tuin.png" class="logobevoegheden" alt="bachyard">Backyard
                </p>
                <p><?php echo ($data['airco']) ? '<img src="assets/img/vink.png" alt="vink" width=20 height=20 >' : '<img src="assets/img/cross.png" alt="kruis" width=20 height=20 >' ?>
                    <img src="assets/img/air-conditioner.png" class="logobevoegheden" alt="air condition">Air
                    Conditioning
                </p>
                <p><?php echo ($data['sauna']) ? '<img src="assets/img/vink.png" alt="vink" width=20 height=20 >' : '<img src="assets/img/cross.png" alt="kruis" width=20 height=20 >' ?>
                    <img src="assets/img/sauna.png" class="logobevoegheden" alt="sauna">Sauna
                </p>
            </div>
        </div>
        <div class="gevondenreisnameimg">
            <h2><?php echo($data['name']) ?></h2>
            <img src="<?php echo($data['house_image']) ?>" alt="House Image">
        </div>

    </section>
    <h3><?php echo $data['summary']; ?></h3>
    <div class="langestreepgevondenreis"></div>

    <section class="reviewsgevondenreizen">
        <div class="reviewblok">
            <?php
            $review_count_stmt = $conn->prepare("SELECT COUNT(*) AS review_count FROM reviews WHERE house_id = :house_id");
            $review_count_stmt->bindParam(':house_id', $house_id);
            $review_count_stmt->execute();
            $review_count_data = $review_count_stmt->fetch();
            $review_count = $review_count_data['review_count'];
            ?>
            <h2 id="reviewtitle">
                <p><?php echo htmlspecialchars($review_count); ?></p>Reviews
            </h2>
            <?php
            try {
                $review_stmt = $conn->prepare("
                        SELECT reviews.rating, reviews.message, users.user_name, users.user_lastname 
                        FROM reviews 
                        JOIN users ON reviews.user_id = users.user_id 
                        WHERE reviews.house_id = :house_id AND reviews.is_approved = TRUE
        ");
                $review_stmt->bindParam(':house_id', $house_id);
                $review_stmt->execute();
                $reviews = $review_stmt->fetchAll();
                if (count($reviews) > 0) {
                    foreach ($reviews as $review) {

                        echo '<div class="review">';
                        echo '<h3>' . ($review['user_name']) . ' ' . ($review['user_lastname']) . '</h3>';
                        switch ($review['rating']) {
                            case 1:
                                echo '<img src="assets/img/1_star.png" alt="1ster" class="stars">';
                                break;
                            case 2:
                                echo '<img src="assets/img/2_star.png" alt="2ster" class="stars">';
                                break;
                            case 3:
                                echo '<img src="assets/img/3_star.png" alt="3ster" class="stars">';
                                break;
                            case 4:
                                echo '<img src="assets/img/4_star.png" alt="4ster" class="stars">';
                                break;
                            case 5:
                                echo '<img src="assets/img/5_stars.png" alt="5ster" class="stars">';
                                break;
                        }
                        echo '<p>' . ($review['message']) . '</p>';
                        echo '<div class="kleinstreepjereview"></div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No reviews available for this house.</p>';
                }
            } catch (PDOException $e) {
                echo "Error fetching reviews: " . $e->getMessage();
            }

            ?>
        </div>
        <div class="reviewgeven">
            <h2>Submit a Review</h2>
            <form id="reviewForm">
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" class="inputreview" name="email" required placeholder="E-Mail">
                </div>
                <div>
                    <label for="score">Score:</label>
                    <input type="number" id="score" class="inputreview" name="score" min="1" max="5" step="1" required
                           placeholder="score">
                </div>
                <div>
                    <label for="message">Message:</label>
                    <textarea id="message" class="inputreview" name="message" required placeholder="message"></textarea>
                </div>
                <input type="hidden" name="house_id" value="<?php echo htmlspecialchars($_GET['house_id']); ?>">
                <button type="submit">Submit Review</button>
            </form>
            <div id="reviewResponse"></div>
        </div>
    </section>
    <div id="reviewResponse"></div>
    </div>
    </section>
    <div class="reseverenblok">
        <div class="flight-departure" id="prijsblokinfo">prijs p.p: <?php echo $data['travel_cost']; ?></div>
        <div class="reizenreseveren/winkelmandje">
            <img src="assets/img/winkelwagen.png" alt="winkelmandje" id="winkelwageimggevondenreis">
            <form action="voorgesteldereizen.php">
                <button type="submit">Submit Review</button>
            </form>
            <button onclick="document.getElementById('id04').style.display='block'" style="width:auto;">boek de reis
            </button>
        </div>
    </div>
    <div id="id04" class="modal">

        <form class="modal-content animate" action="/action_page.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="assets/img/logo.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="uname"><b>Voornaam</b></label>
                <input type="text" placeholder="Voornaam" id="reseveren" name="uname" required>

                <label for="psw"><b>Achternaam</b></label>
                <input type="password" placeholder="Achternaam" name="psw" required>

                <label for="psw"><b>E-Mail</b></label>
                <input type="password" placeholder="E-Mail" name="psw" required>

                <label for="psw"><b>Telefoonnummer</b></label>
                <input type="password" placeholder="Telefoonnummer" name="psw" required>

                <label for="psw"><b>vertrekdatum</b></label>
                <input type="date" placeholder="Land" id="datumreseveren" required>

                <label for="psw"><b>terugkomdatum</b></label>
                <input type="date" placeholder="Plaats" class="datumreseveren" required>
                <div id="extraoptieauto">
                    <input type="checkbox" name="auto">
                    <label for="psw"><a>auto</a></label>

                </div>
                <div class="vliegtuigvinkje">
                <input type="checkbox" id="myCheck" onclick="myFunction()">
                <label for="myCheck">vliegtuig</label>
                </div>
                <div id="dateFields" style="display:none;">
                    <div class="inputvertrekdatumreseveren">
                        <label for="vertrekdatum">aankomstdatum:</label>
                        <input type="date" id="vertrekdatum" name="vertrekdatum">
                    </div>
                    <div class="inputvertrekdatumreseveren">
                        <label for="vertrekdatum">Vertrekdatum:</label>
                        <input type="date" id="vertrekdatum" name="vertrekdatum">
                    </div>
                </div>

                <script>
                    function myFunction() {
                        var checkBox = document.getElementById("myCheck");
                        var dateFields = document.getElementById("dateFields");
                        if (checkBox.checked == true) {
                            dateFields.style.display = "block";
                        } else {
                            dateFields.style.display = "none";
                        }
                    }
                </script>
                <button type="submit">reseveren</button>

            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id04').style.display='none'" class="cancelbtn">
                    Cancel
                </button>

            </div>
        </form>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById('id04');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <section>

    </section>


</main>
<script>
    $(function () {
        $('input[name="daterange"]').daterangepicker({
            singleDatePicker: true, // Changed 'ssingleDatePicker' to 'singleDatePicker'
            showShortcuts: false, // Changed 'false' to false
            showTopbar: false // Changed 'false' to false
        });
    });

    $(document).ready(function () {
        $('#reviewForm').on('submit', function (event) {
            event.preventDefault(); // Prevent the form from submitting the traditional way
            $.ajax({
                url: 'dbcalls/submit_review.php',
                method: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    $('#reviewResponse').html(response);
                    loadReviews();
                },
                error: function (xhr, status, error) {
                    $('#reviewResponse').html('Error: ' + error);
                }
            });
        });

        function loadReviews() {
            var house_id = <?php echo($_GET['house_id']); ?>;
            $.ajax({
                url: 'load_reviews.php',
                method: 'GET',
                data: {
                    house_id: house_id
                },
                success: function (response) {
                    $('section.reviews').html(response);
                }
            });
        }

        loadReviews(); // Initial load of reviews
    });
</script>
<?php
include('footer.php')
?>
</body>

</html>