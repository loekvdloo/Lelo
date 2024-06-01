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
                    <p id="rooms"><?php echo ($data['rooms']) ?><img src="assets/img/kamers.png" class="logobevoegheden" alt="kamers">Rooms</>
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
                <h2><?php echo ($data['name']) ?></h2>
                <img src="<?php echo ($data['house_image']) ?>" alt="House Image">
            </div>

        </section>
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
                        <input type="number" id="score" class="inputreview" name="score" min="1" max="5" step="1" required placeholder="score">
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

        <div class="flight-departure" id="prijsblokinfo">prijs p.p: <?php echo $data['travel_cost']; ?></div>
        <form action="book.php" method="post">
            <button type="submit">Boek de reis</button>
        </form>


        <section>

        </section>


    </main>
    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                singleDatePicker: true, // Changed 'ssingleDatePicker' to 'singleDatePicker'
                showShortcuts: false, // Changed 'false' to false
                showTopbar: false // Changed 'false' to false
            });
        });

        $(document).ready(function() {
            $('#reviewForm').on('submit', function(event) {
                event.preventDefault(); // Prevent the form from submitting the traditional way
                $.ajax({
                    url: 'dbcalls/submit_review.php',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#reviewResponse').html(response);
                        loadReviews();
                    },
                    error: function(xhr, status, error) {
                        $('#reviewResponse').html('Error: ' + error);
                    }
                });
            });

            function loadReviews() {
                var house_id = <?php echo ($_GET['house_id']); ?>;
                $.ajax({
                    url: 'load_reviews.php',
                    method: 'GET',
                    data: {
                        house_id: house_id
                    },
                    success: function(response) {
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