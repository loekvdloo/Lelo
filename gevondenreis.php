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
        $stmt = $conn->prepare("SELECT * FROM house WHERE house_id = :house_id");
        $stmt->bindParam(':house_id', $house_id);
        $stmt->execute();
        $data = $stmt->fetch();
        echo var_dump($data);
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

    </main>
    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                singleDatePicker: true, // Changed 'ssingleDatePicker' to 'singleDatePicker'
                showShortcuts: false, // Changed 'false' to false
                showTopbar: false // Changed 'false' to false
            });
        });
    </script>
    <?php
    include('footer.php')
    ?>
</body>

</html>