<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Love Niek</title>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
          rel="stylesheet">
</head>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacyverklaring</title>
</head>
<body>
<?php
    session_start();
include('header.php');
include('dbcalls/signup.php');
?>
<main style="background-image: url('assets/img/background.png');">
    <section class="over_ons_grotefoto" style="background-image: url('assets/img/vliegtuig_over_ons.png');">
        <h1 id="naamgrotefoto">over ons</h1>
    </section>
    <section class="wrmlelo">
        <div class="contacttekst">
            <h2>welkom bij Lelo</h2>
            <div class="kleinlijntje"></div>
            <p id="tekstcontact">wij zijn een nieuw bedrijf dat zich bezig houd om jouw veilig, goedkoop en zo snel
                mogelijk van A naar B te brengen. daarom verzamelen wij zoveel mogelijk informatie van het internet van
                reizen om jouw de beste reis ervaring te geven</p>
        </div>
        <img src="assets/img/logo.png" alt="logo_over_ons" id="logooverons">
    </section>
    <section class="wrmlelo" id="contactlelo">
        <img src="assets/img/op-reis-met-de-auto_contatpage.png" alt="auto_over_ons" id="autooverons">
        <div class="contacttekst" id="contactoverons">
            <h2>contact</h2>
            <div class="kleinlijntje"></div>
            <p id="tekstcontact">heeft u een algemene vraag, dan kunt u deze stellen door het <a href="contact.php" id="contactformuliercontact">contactformulier</a>
                in te vullen. wij zullen zo snel mogelijk reageren.</p>
        </div>
    </section>
    <div class="tekstindexvoorgesteldereis">
        <h1 class="homepage_test">best bekeken</h1>
        <h3>zie hier onze best/meest bekeken reizen</h3>
    </div>
    <section class="reizenhome" id="overons">

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

        <div class="w3-display-left" id="overonspijltjes" onclick="plusDivs(-1)">&#10094;</div>
        <div class="w3-display-right" id="overonspijltjes" onclick="plusDivs(1)">&#10095;</div>

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
</main>
<?php
include('footer.php');

?>
</body>
</html>
