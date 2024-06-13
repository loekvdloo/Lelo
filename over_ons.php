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
    <section class="favooverons" id="overonsfavo">
        <h1 id="titelfavo">onze favoriete</h1>
        <div class="reizenoverons">

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
        </div>
    </section>
</main>
<?php
include('footer.php');

?>
</body>
</html>
