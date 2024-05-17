<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Love Niek</title>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>
</head>

<body>
<?php
include('header.php');
include('signup.php');
?>

<main style="background-image: url('assets/img/background.png');">
    <section class="contactgrotefoto" style="background-image: url('assets/img/op-reis-met-de-auto_contatpage.png');">
        <h1 id="naamgrotefoto">contact</h1>
    </section>
    <section class="tekstklachten">
        <div class="contacttekst">
            <h2>contact</h2>
            <div class="kleinlijntje"></div>
            <p id="tekstcontact">heeft u een algemene vraag, dan kunt u deze stellen door het <a href="#"
                                                                                                 id="contactformuliercontact">contactformulier</a>
                in te vullen. wij zullen zo snel mogelijk reageren.</p>
            <img src="assets/img/vertical_contactpagina.png" alt="verticaalcontact" id="verticaalcontact">
        </div>
        <div class="klachtenformulier">
            <h2 id="klechtentekst">klachten</h2>
            <div class="kleinlijntje"></div>
            <form class="klachtenform">
                <label class="formklachtentekst">onderwerp:</label>
                <input type="text" class="formklachten" placeholder="onderwerp">
                <label class="formklachtentekst">reis van klacht:</label>
                <input type="text" class="formklachten" placeholder="reis van klacht">
                <label class="formklachtentekst">klacht:</label>
                <input type="text" class="formklachten" placeholder="klacht">
                <label class="formklachtentekst">overig:</label>
                <input type="text" class="formklachten" placeholder="overig">
                <button id="send">login</button>
            </form>
        </div>
    </section>
</main>
<?php
include('footer.php')
?>
</body>
</html>
