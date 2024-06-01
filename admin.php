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
    include('dbcalls/tables.php');
    include('dbcalls/signup.php');
    include('dbcalls/connect.php');
    ?>
    <main class="mainadmin" style="background-image: url('assets/img/background.png');">
        <section class="bekijkreizenadmin">
            <div class="bekijkreizenblok">
                <div class="namenresveren">
                    <p>reseveringsnaam</p>
                    <div class="horizontalestreep"></div>
                    <p>datum</p>
                    <div class="horizontalestreep"></div>
                    <p>personen</p>
                    <div class="horizontalestreep"></div>
                    <p>plaats</p>
                    <div class="horizontalestreep"></div>
                    <p>kosten</p>
                </div>
            </div>
        </section>
        <section class="vakantieverwijderen">
            <main class="mainadmin" style="background-image: url('assets/img/background.png');">
                <h1>Admin Page</h1>
                <form method="get">
                    <label for="table">Select Table:</label>
                    <select name="table" id="table" onchange="this.form.submit()">
                        <option value="house" <?php if ($table == 'house') echo 'selected'; ?>>House</option>
                        <option value="locations" <?php if ($table == 'locations') echo 'selected'; ?>>Locations</option>
                    </select>
                </form>

                <h2><?php echo ucfirst($table); ?> Table</h2>

                <!-- Create Form -->
                <h3>Create <?php echo ucfirst($table); ?></h3>
                <form method="post" enctype="multipart/form-data">
                    <?php if ($table == 'house') : ?>
                        <label for="name">House Name:</label>
                        <input type="text" name="name" required>
                        <label for="summary">summary</label>
                        <input type="text" name="summary" required>
                        <label for="house_image">House Image:</label>
                        <input type="file" name="house_image" required>
                        <label for="rooms">Rooms:</label>
                        <input type="number" name="rooms" required>
                        <label for="pool">Pool:</label>
                        <input type="checkbox" name="pool" value="1">
                        <label for="backyard">Backyard:</label>
                        <input type="checkbox" name="backyard" value="1">
                        <label for="airco">Air Conditioning (Airco):</label>
                        <input type="checkbox" name="airco" value="1">
                        <label for="sauna">Sauna:</label>
                        <input type="checkbox" name="sauna" value="1">

                    <?php elseif ($table == 'locations') : ?>
                        <label for="city">City:</label>
                        <input type="text" name="city" required>
                        <label for="country">Country:</label>
                        <input type="text" name="country" required>
                    <?php endif; ?>
                    <input type="submit" name="create" value="Create">
                </form>
                <!-- Read Table -->
                <h3>Current Records</h3>
                <table border="1">
                    <tr>
                        <?php if ($table == 'house') : ?>
                            <th>House ID</th>
                            <th>House Name</th>
                            <th>House Summary</th>
                            <th>House Image</th>
                        <?php elseif ($table == 'locations') : ?>
                            <th>City</th>
                            <th>Country</th>
                        <?php endif; ?>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($records as $record) : ?>
                        <tr>
                            <?php if ($table == 'house') : ?>
                                <td><?php echo $record['house_id']; ?></td>
                                <td><?php echo $record['name']; ?></td>
                                <td><?php echo $record['summary']; ?></td>
                                <td><img src="<?php echo $record['house_image']; ?>" alt="House Image" width="100"></td>
                            <?php elseif ($table == 'locations') : ?>
                                <td><?php echo $record['city']; ?></td>
                                <td><?php echo $record['country']; ?></td>
                            <?php endif; ?>
                            <td>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="<?php echo $table == 'house' ? 'house_id' : 'city'; ?>" value="<?php echo $record[$table == 'house' ? 'house_id' : 'city']; ?>">
                                    <?php if ($table == 'house') : ?>
                                        <label for="name">House Name:</label>
                                        <input type="text" name="name" value="<?php echo $record['name']; ?>" required>
                                        <label for="summary">Summary:</label>
                                        <input type="text" name="summary" value="<?php echo $record['summary']; ?>" required>
                                        <label for="house_image">House Image URL:</label>
                                        <input type="text" name="house_image" value="<?php echo $record['house_image']; ?>" required>
                                        <label for="rooms">Rooms:</label>
                                        <input type="number" name="rooms" value="<?php echo $record['rooms']; ?>" required>

                                        <label for="pool">Pool:</label>
                                        <input type="checkbox" name="pool" value="1" <?php if ($record['pool']) echo 'checked'; ?>>
                                        <label for="backyard">Backyard:</label>
                                        <input type="checkbox" name="backyard" value="1" <?php if ($record['backyard']) echo 'checked'; ?>>
                                        <label for="airco">Air Conditioning (Airco):</label>
                                        <input type="checkbox" name="airco" value="1" <?php if ($record['airco']) echo 'checked'; ?>>
                                        <label for="sauna">Sauna:</label>
                                        <input type="checkbox" name="sauna" value="1" <?php if ($record['sauna']) echo 'checked'; ?>>

                                    <?php elseif ($table == 'locations') : ?>
                                        <label for="city">City:</label>
                                        <input type="text" name="city" value="<?php echo $record['city']; ?>" required>
                                        <label for="country">Country:</label>
                                        <input type="text" name="country" value="<?php echo $record['country']; ?>" required>
                                    <?php endif; ?>
                                    <input type="submit" name="update" value="Update">
                                    <input type="submit" name="delete" value="Delete">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>

                <h3>Assign Admin Rights</h3>
                <form action="dbcalls/assign_admin.php" method="POST">
                    <label for="email">User Email:</label>
                    <input type="email" id="email" name="email" required>
                    <button type="submit">Assign as Admin</button>
                </form>

                <!-- Review Approval Section -->
                <?php
                // Handle approval or rejection
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (isset($_POST['review_id'])) {
                        $review_id = $_POST['review_id'];
                        $action = $_POST['action'];

                        if ($action == 'approve') {
                            $stmt = $conn->prepare("UPDATE reviews SET is_approved = TRUE WHERE review_id = :review_id");
                            $stmt->bindParam(':review_id', $review_id);
                            $stmt->execute();
                        } elseif ($action == 'reject') {
                            $stmt = $conn->prepare("DELETE FROM reviews WHERE review_id = :review_id");
                            $stmt->bindParam(':review_id', $review_id);
                            $stmt->execute();
                        }
                    }
                }

                // Fetch reviews that need approval
                $stmt = $conn->prepare("
                SELECT reviews.*, users.user_email 
                FROM reviews 
                JOIN users 
                ON reviews.user_id = users.user_id 
                WHERE is_approved = FALSE");
                $stmt->execute();
                $reviews = $stmt->fetchAll();
                ?>

                <h3>Pending Reviews</h3>
                <table border="1">
                    <tr>
                        <th>Review ID</th>
                        <th>Email</th>
                        <th>House ID</th>
                        <th>Rating</th>
                        <th>Message</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($reviews as $review) : ?>
                        <tr>
                            <td><?php echo $review['review_id']; ?></td>
                            <td><?php echo $review['user_email']; ?></td>
                            <td><?php echo $review['house_id']; ?></td>
                            <td><?php echo $review['rating']; ?></td>
                            <td><?php echo $review['message']; ?></td>
                            <td>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="review_id" value="<?php echo $review['review_id']; ?>">
                                    <button type="submit" name="action" value="approve">Approve</button>
                                </form>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="review_id" value="<?php echo $review['review_id']; ?>">
                                    <button type="submit" name="action" value="reject">Reject</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </main>
            <?php
            include('footer.php');
            ?>
</body>

</html>