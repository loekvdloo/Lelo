<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lelo</title>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <!--
        <script type="text/javascript" src="tijdmenubestand/jquery.min.js"></script>
        <script type="text/javascript" src="tijdmenubestand/daterangepicker.min.js"></script>
        <script type="text/javascript" src="tijdmenubestand/moment.min.js"></script>
    -->

    <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>

<body>

    <?php
    session_start();
    include('header.php');
    include('dbcalls/connect.php');
    include('dbcalls/signup.php');
    include('dbcalls/search.php');

    $review_count_stmt = $conn->prepare("SELECT COUNT(*) AS country FROM locations");

    $review_count_stmt->execute();
    $review_count_data = $review_count_stmt->fetch();
    $review_count = $review_count_data['country'];
    ?>
    <main style="background-image: url('assets/img/background.png');">


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
                <input type="image" alt="Submit" src="assets/img/zoeken.png" value="Zoeken" id="zoekenhome">
            </form>
        </div>
    </section>


        <div class="tekstindexvoorgesteldereis">
            <h1 class="homepage_test">best bekeken</h1>
            <h3>zie hier onze best/meest bekeken reizen</h3>
        </div>
        <section class="reizenhome">

            <div class="imgreizenhome mySlides" style="background-image: url('assets/img/japan_homepagina.png');">
                <div class="blokachtertekst">
                    <h1>Japan</h1>
                </div>
                <div class="voorgesteldereisbekijken">
                    <a href="country.php?land=Japan">bekijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
                </div>
            </div>
            <div class="imgreizenhome mySlides" style="background-image: url('assets/img/zuid-afrika_homepagina.png');">
                <div class="blokachtertekst">
                    <h1>Zuid-Afrika</h1>
                </div>
                <div class="voorgesteldereisbekijken">
                    <a href="country.php?land=South Africa">bekijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
                </div>
            </div>
            <div class="imgreizenhome mySlides" style="background-image: url('assets/img/brazilie_homepagina.png');">
                <div class="blokachtertekst">
                    <h1>Brazilië</h1>
                </div>
                <div class="voorgesteldereisbekijken">
                    <a href="country.php?land=Brazil">bekijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
                </div>
            </div>
            <div class="imgreizenhome mySlides" style="background-image: url('assets/img/australie_homepagina.png');">
                <div class="blokachtertekst">
                    <h1>Australië</h1>
                </div>
                <div class="voorgesteldereisbekijken">
                    <a href="country.php?land=Australia">bekijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
                </div>
            </div>
            <div class="imgreizenhome mySlides" style="background-image: url('assets/img/italie_homepagina.png');">
                <div class="blokachtertekst">
                    <h1>Italië</h1>
                </div>
                <div class="voorgesteldereisbekijken">
                    <a href="country.php?land=Italy">bekijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
                </div>
            </div>
            <div class="imgreizenhome mySlides" style="background-image: url('assets/img/canada_hompagina.png');">
                <div class="blokachtertekst">
                    <h1>Canada</h1>
                </div>
                <div class="voorgesteldereisbekijken">
                    <a href="country.php?land=Canada">bekijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
                </div>
            </div>
            <div class="imgreizenhome mySlides" style="background-image: url('assets/img/frankrijk_homepagina.png');">
                <div class="blokachtertekst">
                    <h1>Frankrijk</h1>
                </div>
                <div class="voorgesteldereisbekijken">
                    <a href="country.php?land=France">bekijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
                </div>
            </div>
            <div class="imgreizenhome mySlides" style="background-image: url('assets/img/duitsland_homepagina.png');">
                <div class="blokachtertekst">
                    <h1>Duitsland</h1>
                </div>
                <div class="voorgesteldereisbekijken">
                    <a href="country.php?land=Germany">bekijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
                </div>
            </div>
            <div class="imgreizenhome mySlides" style="background-image: url('assets/img/spanje_homepagina.png');">
                <div class="blokachtertekst">
                    <h1>Spanje</h1>
                </div>
                <div class="voorgesteldereisbekijken">
                    <a href="country.php?land=Spane">bekijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
                </div>
            </div>
            <div class="imgreizenhome mySlides" style="background-image: url('assets/img/thailand_homepagina.png');">
                <div class="blokachtertekst">
                    <h1>Thailand</h1>
                </div>
                <div class="voorgesteldereisbekijken">
                    <a href="country.php?land=Thailand">bekijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
                </div>
            </div>
            <div class="imgreizenhome mySlides" style="background-image: url('assets/img/amerika_homepagina.png');">
                <div class="blokachtertekst">
                    <h1>amerika</h1>
                </div>
                <div class="voorgesteldereisbekijken">
                    <a href="country.php?land=USA">bekijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
                </div>
            </div>
            <div class="imgreizenhome mySlides" style="background-image: url('assets/img/egytpe_homepagina.png');">
                <div class="blokachtertekst">
                    <h1>egypte</h1>
                </div>
                <div class="voorgesteldereisbekijken">
                    <a href="country.php?land=Egypt">bekijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
                </div>
            </div>

            <div class="w3-display-left" onclick="plusDivs(-1)">&#10094;</div>
            <div class="w3-display-right" onclick="plusDivs(1)">&#10095;</div>

            <div class="w3-center w3-container w3-section w3-large w3-text-white" style="width:100%">
                <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
                <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
            </div>
        </section>


        <script>
            var slideIndex = 1;
            showDivs(slideIndex);

            function plusDivs(n) {
                showDivs(slideIndex += n);
            }

            function currentDiv(n) {
                showDivs(slideIndex = n);
            }

            function showDivs(n) {
                var i;
                var x = document.getElementsByClassName("mySlides");

                if (n > Math.ceil(x.length / 3)) {
                    slideIndex = 1
                }
                if (n < 1) {
                    slideIndex = Math.ceil(x.length / 3)
                }
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }

                for (i = (slideIndex - 1) * 3; i < slideIndex * 3 && i < x.length; i++) {
                    x[i].style.display = "block";
                }

            }
        </script>
        <div class="tekstindexvoorgesteldereis">
            <h1 class="homepage_test">alle seizoenen</h1>
            <h3>voor het gemakkelijk zoeken voor jouw vakantie</h3>
        </div>
        <section class="reizenhome" id="seizoen">
            <div class="imgreizenhome" id="seizoenblok" style="background-image: url('assets/img/lente_homepagina.png');">
                <div class="blokseizoenen">
                    <h1>lente</h1>
                </div>
                <div class="voorgesteldeseizoen">
                    <a href="seizoen.php?seizoen=lente">beijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
                </div>
            </div>
            <div class="imgreizenhome" id="seizoenblok" style="background-image: url('assets/img/zomer_homepagina.png');">
                <div class="blokseizoenen">
                    <h1>zomer</h1>
                </div>
                <div class="voorgesteldeseizoen">
                    <a href="seizoen.php?seizoen=zomer">beijken<img src="assets/img/arrow_voorgesteldereizen.png"></a>
                </div>
            </div>
            <div class="imgreizenhome" id="seizoenblok" style="background-image: url('assets/img/herfst_homepagina.png');">
                <div class="blokseizoenen">
                    <h1>herfst</h1>
                </div>
                <div class="voorgesteldeseizoen">
                    <a href="seizoen.php?seizoen=herfst">beijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
                </div>
            </div>
            <div class="imgreizenhome" id="seizoenblok" style="background-image: url('assets/img/winter_homepagina.png');">
                <div class="blokseizoenen">
                    <h1>winter</h1>
                </div>
                <div class="voorgesteldeseizoen">
                    <a href="seizoen.php?seizoen=winter">beijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
                </div>
            </div>
        </section>
        <script>
            $(function() {
                $('input[name="daterange"]').daterangepicker({
                    ssingleDatePicker: 'true',
                    showShortcuts: 'false',
                    showTopbar: 'false'
                });
            });
        </script>

    </main>
    <?php
    include('footer.php')
    ?>
</body>

</html>