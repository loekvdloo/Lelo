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
<<<<<<< HEAD
include('dbcalls/signup.php');
=======
include('connection.php');
>>>>>>> 15ba256432242e319dc18454e74f8d35d45755c1
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
        <h1>vakantie verwijderen</h1>
        <form action="/action_page.php" class="formvakantievw">
            <input type="text" placeholder="Search.." id="inputvakantievw" name="search">
            <button type="submit" class="vakantievwknop">zoeken</button>
        </form>
    </section>
    <section class="vakantieverwijderen">
        <h1>vakantie veranderen</h1>
        <form action="/action_page.php" class="formvakantievw">
            <input type="text" placeholder="Search.." id="inputvakantievw" name="search">
            <button type="submit" class="vakantievwknop">zoeken</button>
        </form>
    </section>

</main>
<?php
include('footer.php')
?>
</body>
</html>