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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>

<body>
<?php
include('header.php');
include('dbcalls/connect.php');
include ('dbcalls/signup.php');

$data = []; // Initialize $data as an empty array

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) 
{
    session_start();
    $house_id = $_POST['house_id']; // Fixed the variable name

    try
    {
        $stmt = $conn->prepare("SELECT * FROM house WHERE id = :house_id");
        $stmt->bindParam(':house_id', $house_id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

    }
    catch (PDOException $e) 
    {
        echo "Fout met Pagina laden: " . $e->getMessage();
    }
}

?>

<main style="background-image: url('assets/img/background.png');">

<section>
    <h2><?php echo isset($data['name']) ? $data['name'] : ''; ?></h2>
    <img src="<?php echo isset($data['house_image']) ? $data['house_image'] : ''; ?>" alt="House Image">
    <p>Rooms: <?php echo isset($data['rooms'])?></p>
    <p>Pool: <?php echo isset($data['pool']) ? $data['pool'] : ''; ?></p>
    <p>Backyard: <?php echo isset($data['backyard']) ? $data['backyard'] : ''; ?></p>
    <p>Air Conditioning: <?php echo isset($data['airco']) ? $data['airco'] : ''; ?></p>
    <p>Sauna: <?php echo isset($data['sauna']) ? $data['sauna'] : ''; ?></p>
</section>


</main>
<script>
    $(function () {
        $('input[name="daterange"]').daterangepicker(
            {
                singleDatePicker: true, // Changed 'ssingleDatePicker' to 'singleDatePicker'
                showShortcuts: false, // Changed 'false' to false
                showTopbar: false // Changed 'false' to false
            }
        );
    });
</script>
<?php
include('footer.php')
?>
</body>
</html>
