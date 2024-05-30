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
<body>
<?php
include('header.php');
?>
<main style="background-image: url('assets/img/background.png');">

</main>
<?php
include('footer.php');

?>
</body>
</html>

<!--    <label>voornaam:</label>-->
<!--    <input type="text" id="voornaam" >-->
<!--    <label>achternaam:</label>-->
<!--    <input type="text" id="achternaam" >-->
<!--    <label>straatnaam:</label>-->
<!--    <input type="text" id="straatnaam">-->
<!--    <label>huisnummer:</label>-->
<!--    <input type="text" id="huisnummer">-->
<!--    <button id="send" onclick="CheckField();">login</button>-->
<!---->
<!--    <script src="test.php" ></script>-->
<!--<script>-->
<!--    function  CheckField(){-->
<!--        var voornaam = document.getElementById("voornaam");-->
<!--        var achternaam = document.getElementById("achternaam");-->
<!--        var straatnaam = document.getElementById("straatnaam");-->
<!--        var huisnummer = parseInt(document.getElementById("huisnummer"));-->
<!---->
<!--        if (voornaam.value.length === "" || achternaam.value.length === "" || straatnaam.value.length === ""){-->
<!--            alert("voer je voornaam of achternaam in");-->
<!--            return false;-->
<!--        }-->
<!--        if(isNaN(huisnummer.value)){-->
<!--            alert("voer een getal in");-->
<!--            return false;-->
<!--        }-->
<!--    }-->
<!--</script>-->
    <button onclick="document.getElementById('id04').style.display='block'" style="width:auto;">Login</button>

    <div id="id04" class="modal">

        <form class="modal-content animate" action="/action_page.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="assets/img/logo.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="uname"><b>Voornaam</b></label>
                <input type="text" placeholder="Voornaam" id="reseveren" name="uname" required>

                <label for="psw"><b>Achternaam</b></label>
                <input type="password" placeholder="Achternaam" name="psw" required>

                <label for="psw"><b>E-Mail</b></label>
                <input type="password" placeholder="E-Mail" name="psw" required>

                <label for="psw"><b>Telefoonnummer</b></label>
                <input type="password" placeholder="Telefoonnummer" name="psw" required>

                <label for="psw"><b>Land</b></label>
                <input type="password" placeholder="Land" name="psw" required>

                <label for="psw"><b>Plaats</b></label>
                <input type="password" placeholder="Plaats" name="psw" required>

                <button type="submit">reseveren</button>

            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id04').style.display='none'" class="cancelbtn">Cancel</button>

            </div>
        </form>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById('id04');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>