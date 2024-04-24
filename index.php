<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Lelo</title>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>
</head>

<body>
<?php
include('header.php');
include ('signup.php');
?>

<main style="background-image: url('assets/img/background.png');">
    <section class="reizoekenhomepagina" style="background-image: url('assets/img/foto_homepagina.png');">
        <h1>Plan je reis hier</h1>
        <div class="reiszoeken">
            <form class="formulierhome">
                <input type="text"  name="bestemming" placeholder="bestemming" id="vakantieformulier">
                <input type="text" name="vertrekdatum" placeholder="vertrekdatum" id="vakantieformulier">
                <div class="drop">
                    <input class="hoeveelpers" readonly="" placeholder="personen" id="vakantieformulier">
                    <div class="personenetoevoegen">

                        <div class="keuzepers">
                            <label for="adults">Volwassenen:</label>
                            <input type="number" id="volwassenen" class="pers" min="0" value="0">
                        </div>
                        <div class="keuzepers">
                            <label for="children">Kinderen:</label>
                            <input type="number" id="kinderen" class="pers" min="0" value="0">
                        </div>
                        <div class="keuzepers">
                            <label for="babies">Baby's:</label>
                            <input type="number" id="baby" class="pers" min="0" value="0">
                        </div>
                    </div>
                </div>
                <input type="text" name="luchthaven" placeholder="luchthaven" id="vakantieformulier">
                <input type="text" name="reisduur" placeholder="reisduur" id="vakantieformulier">
                <input type="submit" name="zoeken" value="zoeken" id="zoekenhome">
            </form>
        </div>
    </section>
    <section class="reizenhome">
        <div class="imgreizenhome" style="background-image: url('assets/img/japan_homepagina.png');">
            <div class="blokachtertekst">
            <h1>Japan</h1>
            </div>
            <div class="voorgesteldereisbekijken">
            <a href="#">beijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
            </div>
        </div>
        <div class="imgreizenhome" style="background-image: url('assets/img/zuid-afrika_homepagina.png');">
            <div class="blokachtertekst">
                <h1>zuid-afrika</h1>
            </div>
            <div class="voorgesteldereisbekijken">
                <a href="#">beijken<img src="assets/img/arrow_voorgesteldereizen.png"></a>
            </div>
        </div>
        <div class="imgreizenhome" style="background-image: url('assets/img/brazilie_homepagina.png');">
            <div class="blokachtertekst">
                <h1>Brazilie</h1>
            </div>
            <div class="voorgesteldereisbekijken">
                <a href="#">beijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
            </div>
        </div>
    </section>
    <section class="reizenhome">
        <div class="imgreizenhome" style="background-image: url('assets/img/lente_homepagina.png');">
            <div class="blokseizoenen">
                <h1>lente</h1>
            </div>
            <div class="voorgesteldeseizoen">
                <a href="#">beijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
            </div>
        </div>
        <div class="imgreizenhome" style="background-image: url('assets/img/zomer_homepagina.png');">
            <div class="blokseizoenen">
                <h1>zomer</h1>
            </div>
            <div class="voorgesteldeseizoen">
                <a href="#">beijken<img src="assets/img/arrow_voorgesteldereizen.png"></a>
            </div>
        </div>
        <div class="imgreizenhome" style="background-image: url('assets/img/herfst_homepagina.png');">
            <div class="blokseizoenen">
                <h1>herfst</h1>
            </div>
            <div class="voorgesteldeseizoen">
                <a href="#">beijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
            </div>
        </div>
        <div class="imgreizenhome" style="background-image: url('assets/img/winter_homepagina.png');">
            <div class="blokseizoenen">
                <h1>winter</h1>
            </div>
            <div class="voorgesteldeseizoen">
                <a href="#">beijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
            </div>
        </div>
    </section>

</main>
<?php
include('footer.php')
?>
</body>
</html>