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

?>

<main style="background-image: url('assets/img/background.png');">
    <section class="contactgrotefoto" style="background-image: url('assets/img/op-reis-met-de-auto_contatpage.png');">
        <h1 id="naamgrotefoto">contact</h1>
    </section>
    <section class="tekstklachten">
        <div class="contacttekst">
            <h2>contact</h2>
            <div class="kleinlijntje"></div>
            <p id="tekstcontact">heeft u een algemene vraag, dan kunt u deze stellen door het <a href="#" id="contactformuliercontact">contactformulier</a>
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
                <button id="send">versturen</button>
            </form>
        </div>
    </section>
    <section class="contactomrulier">
        <div class="klachtenformulier" id="contactpagina">
            <h2 id="klechtentekst">contact</h2>
            <div class="kleinlijntje"></div>
            <form class="klachtenform">
                <label class="formklachtentekst">Voornaam:</label>
                <input type="text" class="formklachten" placeholder="Voornaam">
                <label class="formklachtentekst">Achternaam:</label>
                <input type="text" class="formklachten" placeholder="Achternaam">
                <label class="formklachtentekst">Telefoonnummer:</label>
                <input type="text" class="formklachten" placeholder="Telefoonnummer">
                <label class="formklachtentekst">E-Mail:</label>
                <input type="text" class="formklachten" placeholder="E-Mail">
                <label class="formklachtentekst">vraag/opmerking:</label>
                <input type="text" class="formkvraag" placeholder="vraag/opmerking">
                <button id="send">versturen</button>
            </form>
        </div>
        <div id="imgvak">
        <img src="assets/img/29329005-fantasierijk-reis-silhouet-van-kind-aan-koffer-tegen-instelling-zon-verticaal-mobiel-behang-ai-gegenereerd-gratis-foto%201.png"
             alt="verticaalcontact2" id="verticaalcontact2">
        </div>
    </section>
</main>
<?php
include('footer.php')
?>
</body>
</html>
