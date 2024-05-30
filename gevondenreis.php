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
        <section>
            <h2><?php echo ($data['name']) ?></h2>
            <img src="<?php echo ($data['house_image']) ?>" alt="House Image">
            <p>Rooms: <?php echo ($data['rooms'])        ?></p>
            <p>Pool: <?php echo ($data['pool']) ? '<img src="assets/img/vink.png" alt="vink" width=20 height=20 >' : '<img src="assets/img/cross.png" alt="kruis" width=20 height=20 >'  ?></p>
            <p>Backyard: <?php echo ($data['backyard'])  ? '<img src="assets/img/vink.png" alt="vink" width=20 height=20 >' : '<img src="assets/img/cross.png" alt="kruis" width=20 height=20 >' ?></p>
            <p>Air Conditioning: <?php echo ($data['airco'])  ? '<img src="assets/img/vink.png" alt="vink" width=20 height=20 >' : '<img src="assets/img/cross.png" alt="kruis" width=20 height=20 >' ?></p>
            <p>Sauna: <?php echo ($data['sauna'])  ? '<img src="assets/img/vink.png" alt="vink" width=20 height=20 >' : '<img src="assets/img/cross.png" alt="kruis" width=20 height=20 >' ?></p>
        </section>



        <section>
            <h3>Reviews</h3>
            <?php
    try {
        $review_stmt = $conn->prepare("
            SELECT reviews.rating, reviews.message, users.user_name, users.user_lastname 
            FROM reviews 
            JOIN users ON reviews.user_id = users.user_id 
            WHERE reviews.house_id = :house_id
        ");
        $review_stmt->bindParam(':house_id', $house_id);
        $review_stmt->execute();
        $reviews = $review_stmt->fetchAll();

        if (count($reviews) > 0) {
            foreach ($reviews as $review) {
                echo '<div class="review">';
                echo '<p>Score: ' . ($review['rating']) . ' / 5</p>';
                echo '<p>Message: ' . ($review['message']) . '</p>';
                echo '<p>By: ' . ($review['user_name']) . ' ' . ($review['user_lastname']) . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No reviews available for this house.</p>';
        }
    } catch (PDOException $e) {
        echo "Error fetching reviews: " . $e->getMessage();
    }

            ?>
        </section>

        <div class="flight-departure" id="prijsblokinfo">prijs p.p: <?php echo $data['travel_cost']; ?></div>
        <form action="book.phh" method="post" >
            <button type="submit">Boek de reis</button>
        </form>

        <section>
            <h2>Submit a Review</h2>
            <form id="reviewForm">
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="score">Score:</label>
                    <input type="number" id="score" name="score" min="1" max="5" step="0.1" required>
                </div>
                <div>
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <input type="hidden" name="house_id" value="<?php echo htmlspecialchars($_GET['house_id']); ?>">
                <button type="submit">Submit Review</button>
            </form>
            <div id="reviewResponse"></div>
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
                    data: { house_id: house_id },
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