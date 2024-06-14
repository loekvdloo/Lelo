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
?>

<main style="background-image: url('assets/img/background.png');">


<<<<<<< Updated upstream

    <section class="reizoekenhomepagina" style="background-image: url('assets/img/foto_homepagina.png');">
        <h1>Plan je reis hier</h1>
        <div class="reiszoeken">
            
            <form class="formulierhome">
                <input type="text" name="bestemming" placeholder="bestemming" id="vakantieformulier">
                <input type="text" name="daterange"/>
                <div class="drop">
                    <input class="hoeveelpers" readonly="" placeholder="personen" id="vakantiepers">
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

                <input type="text" name="luchthaven" placeholder="luchthaven" id="vakantieformuliervlucht">
                <input type="image" src="assets/img/zoeken.png" alt="Submit" value="zoeken" id="zoekenhome">
            </form>

        </div>
    </section>
=======
        <section class="reizoekenhomepagina" style="background-image: url('assets/img/vliegtuigfoto.png');">
            <div class="tekstindexfoto">
                <h1>Plan je reis hier</h1>
                <h3>We hebben reizen naar verschillende landen waar wij reizen aanbieden.</h3>
            </div>
            <div class="reiszoeken">
                <!-- Form for searching by date -->
                <form class="formulierhome" method="GET" action="search.php">
                    <input type="date" name="search_query" placeholder="Zoek op maand (YYYY-MM-DD)" id="vakantieformulier">
                    <input type="text" name="search_query" placeholder="Zoek op land" id="vakantieformulier">
                    <input type="submit" value="Zoeken" id="zoekenhome">
                </form>
            </div>
        </section>
>>>>>>> Stashed changes



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
        <div class="imgreizenhome" id="seizoenblok" style="background-image: url('assets/img/lente_homepagina.png');">
            <div class="blokseizoenen">
                <h1>lente</h1>
            </div>
            <div class="voorgesteldeseizoen">
                <a href="#">beijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
            </div>
        </div>
        <div class="imgreizenhome" id="seizoenblok" style="background-image: url('assets/img/zomer_homepagina.png');">
            <div class="blokseizoenen">
                <h1>zomer</h1>
            </div>
            <div class="voorgesteldeseizoen">
                <a href="#">beijken<img src="assets/img/arrow_voorgesteldereizen.png"></a>
            </div>
        </div>
        <div class="imgreizenhome" id="seizoenblok" style="background-image: url('assets/img/herfst_homepagina.png');">
            <div class="blokseizoenen">
                <h1>herfst</h1>
            </div>
            <div class="voorgesteldeseizoen">
                <a href="#">beijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
            </div>
        </div>
        <div class="imgreizenhome" id="seizoenblok" style="background-image: url('assets/img/winter_homepagina.png');">
            <div class="blokseizoenen">
                <h1>winter</h1>
            </div>
            <div class="voorgesteldeseizoen">
                <a href="#">beijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
            </div>
        </div>
    </section>
    <script>
        $(function () {
            $('input[name="daterange"]').daterangepicker(
                {
                    ssingleDatePicker: 'true',
                    showShortcuts: 'false',
                    showTopbar: 'false'
                }
            );
        });

    </script>

</main>
<?php
include('footer.php')
?>
</body>
</html>
