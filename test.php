<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Love Niek</title>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacyverklaring</title>
</head>
<style>

/*</style>*/
<body>
<?php
include('header.php');
?>
<main style="background-image: url('assets/img/background.png');">


    <section class="reizenhome">
        <div class="imgreizenhome mySlides" style="background-image: url('assets/img/japan_homepagina.png');">
            <div class="blokachtertekst">
                <h1>Japan</h1>
            </div>
            <div class="voorgesteldereisbekijken">
                <a href="#">bekijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
            </div>
        </div>
        <div class="imgreizenhome mySlides" style="background-image: url('assets/img/zuid-afrika_homepagina.png');">
            <div class="blokachtertekst">
                <h1>Zuid-Afrika</h1>
            </div>
            <div class="voorgesteldereisbekijken">
                <a href="#">bekijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
            </div>
        </div>
        <div class="imgreizenhome mySlides" style="background-image: url('assets/img/brazilie_homepagina.png');">
            <div class="blokachtertekst">
                <h1>Brazilië</h1>
            </div>
            <div class="voorgesteldereisbekijken">
                <a href="#">bekijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
            </div>
        </div>
        <div class="imgreizenhome mySlides" style="background-image: url('assets/img/australie_homepagina.png');">
            <div class="blokachtertekst">
                <h1>Australië</h1>
            </div>
            <div class="voorgesteldereisbekijken">
                <a href="#">bekijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
            </div>
        </div>
        <div class="imgreizenhome mySlides" style="background-image: url('assets/img/italie_homepagina.png');">
            <div class="blokachtertekst">
                <h1>Italië</h1>
            </div>
            <div class="voorgesteldereisbekijken">
                <a href="#">bekijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
            </div>
        </div>
        <div class="imgreizenhome mySlides" style="background-image: url('assets/img/canada_homepagina.png');">
            <div class="blokachtertekst">
                <h1>Canada</h1>
            </div>
            <div class="voorgesteldereisbekijken">
                <a href="#">bekijken <img src="assets/img/arrow_voorgesteldereizen.png"></a>
            </div>
        </div>

        <div class="w3-display-bottommiddle">
            <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
            <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
        </div>

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
            var dots = document.getElementsByClassName("demo");
            if (n > Math.ceil(x.length / 3)) {slideIndex = 1}
            if (n < 1) {slideIndex = Math.ceil(x.length / 3)}
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" w3-white", "");
            }
            for (i = (slideIndex - 1) * 3; i < slideIndex * 3 && i < x.length; i++) {
                x[i].style.display = "block";
            }
            dots[slideIndex-1].className += " w3-white";
        }
    </script>
</main>
<?php
include('footer.php');

?>
</body>
</html>













<!--    <button onclick="document.getElementById('id04').style.display='block'" style="width:auto;">Login</button>-->
<!---->
<!--    <div id="id04" class="modal">-->
<!---->
<!--        <form class="modal-content animate" action="/action_page.php" method="post">-->
<!--            <div class="imgcontainer">-->
<!--                <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>-->
<!--                <img src="assets/img/logo.png" alt="Avatar" class="avatar">-->
<!--            </div>-->
<!---->
<!--            <div class="container">-->
<!--                <label for="uname"><b>Voornaam</b></label>-->
<!--                <input type="text" placeholder="Voornaam" id="reseveren" name="uname" required>-->
<!---->
<!--                <label for="psw"><b>Achternaam</b></label>-->
<!--                <input type="password" placeholder="Achternaam" name="psw" required>-->
<!---->
<!--                <label for="psw"><b>E-Mail</b></label>-->
<!--                <input type="password" placeholder="E-Mail" name="psw" required>-->
<!---->
<!--                <label for="psw"><b>Telefoonnummer</b></label>-->
<!--                <input type="password" placeholder="Telefoonnummer" name="psw" required>-->
<!---->
<!--                <label for="psw"><b>Land</b></label>-->
<!--                <input type="password" placeholder="Land" name="psw" required>-->
<!---->
<!--                <label for="psw"><b>Plaats</b></label>-->
<!--                <input type="password" placeholder="Plaats" name="psw" required>-->
<!---->
<!--                <button type="submit">reseveren</button>-->
<!---->
<!--            </div>-->
<!---->
<!--            <div class="container" style="background-color:#f1f1f1">-->
<!--                <button type="button" onclick="document.getElementById('id04').style.display='none'" class="cancelbtn">Cancel</button>-->
<!---->
<!--            </div>-->
<!--        </form>-->
<!--    </div>-->
<!---->
<!--    <script>-->
<!--        // Get the modal-->
<!--        var modal = document.getElementById('id04');-->
<!---->
<!--        // When the user clicks anywhere outside of the modal, close it-->
<!--        window.onclick = function(event) {-->
<!--            if (event.target == modal) {-->
<!--                modal.style.display = "none";-->
<!--            }-->
<!--        }-->
<!--    </script>-->