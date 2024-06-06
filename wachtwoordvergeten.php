<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Lelo</title>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <!--
        <script type="text/javascript" src="tijdmenubestand/jquery.min.js"></script>
        <script type="text/javascript" src="tijdmenubestand/daterangepicker.min.js"></script>
        <script type="text/javascript" src="tijdmenubestand/moment.min.js"></script>
    -->

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
?>

<main style="background-image: url('assets/img/background.png');">
<section class="wachtwoordvegeten">
    <form class="formwachtwoord">
        <h3>Problemen met aanmelden?</h3>
            <label for="email"><b>Voer je e-mailadres, telefoonnummer of gebruikersnaam in zodat we je een link kunnen sturen waarmee je weer toegang kunt krijgen tot je account.</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>
            <button type="submit" id="versturenwachtwoordvergeten" name="login" >Login</button>

    </form>
</section>
</main>
<?php
include('footer.php')
?>
</body>
</html>
