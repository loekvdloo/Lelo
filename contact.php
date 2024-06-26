<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Love Niek</title>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
</head>

<body>
    <?php
    session_start();
    include('dbcalls/connect.php');
    include('header.php');
    include('dbcalls/signup.php');
    include('dbcalls/submit_complaint.php');
    ?>

    <main style="background-image: url('assets/img/background.png');">
        <section class="contactgrotefoto"
            style="background-image: url('assets/img/op-reis-met-de-auto_contatpage.png');">
            <h1 id="naamgrotefoto">contact</h1>
        </section>
        <section class="tekstklachten">
            <div class="contacttekst">
                <h2>contact</h2>
                <div class="kleinlijntje"></div>
                <p id="tekstcontact">heeft u een algemene vraag, dan kunt u deze stellen door het <a href="#"
                        id="contactformuliercontact">contactformulier</a> in te vullen. wij zullen zo snel mogelijk
                    reageren.</p>
                <img src="assets/img/vertical_contactpagina.png" alt="verticaalcontact" id="verticaalcontact">
            </div>
            <div class="klachtenformulier">
                <h2 id="klechtentekst">klachten</h2>
                <div class="kleinlijntje"></div>
                <form id="complaintForm" class="klachtenform" method="post" action="dbcalls/submit_complaint.php">
                    <label class="formklachtentekst">onderwerp:</label>
                    <input type="text" class="formklachten" name="subject" placeholder="onderwerp">
                    <label class="formklachtentekst">reis van klacht:</label>
                    <input type="text" class="formklachten" name="travel" placeholder="reis van klacht">
                    <label class="formklachtentekst">klacht:</label>
                    <input type="text" class="formklachten" name="complaint" placeholder="klacht">
                    <label class="formklachtentekst">overig:</label>
                    <input type="text" class="formklachten" name="other" placeholder="overig">
                    
                    <?php if (isset($_SESSION['user_id'])) : ?>
                        <!-- Show submit button if user is logged in -->
                        <input type="submit" id="send" name="versturen">
                    <?php else : ?>
                        <!-- Show login message or alternative content if user is not logged in -->
                        <p>Log in om een klacht in te dienen of bel de klantenservice.</p>
                    <?php endif; ?>
                    
                </form>
                <div id="complaintMessage"></div>
            </div>
        </section>
        <section class="contactomrulier">
            <div class="klachtenformulier" id="contactpagina">
                <h2 id="klechtentekst">contact</h2>
                <div class="kleinlijntje"></div>
                <form id="contactForm" class="klachtenform" method="post" action="dbcalls/submit_contact.php">
                    <label class="formklachtentekst">Voornaam:</label>
                    <input type="text" class="formklachten" name="firstname" placeholder="Voornaam">
                    <label class="formklachtentekst">Achternaam:</label>
                    <input type="text" class="formklachten" name="lastname" placeholder="Achternaam">
                    <label class="formklachtentekst">Telefoonnummer:</label>
                    <input type="text" class="formklachten" name="number" placeholder="Telefoonnummer">
                    <label class="formklachtentekst">E-Mail:</label>
                    <input type="text" class="formklachten" name="email" placeholder="E-Mail">
                    <label class="formklachtentekst">vraag/opmerking:</label>
                    <input type="text" class="formkvraag" name="message" placeholder="vraag/opmerking">
                    <button type="submit" id="sendContact">versturen</button>
                </form>
                <div id="contactMessage"></div>
            </div>
            <div id="imgvak">
                <img
                    src="assets/img/29329005-fantasierijk-reis-silhouet-van-kind-aan-koffer-tegen-instelling-zon-verticaal-mobiel-behang-ai-gegenereerd-gratis-foto%201.png"
                    alt="verticaalcontact2" id="verticaalcontact2">
            </div>
        </section>
    </main>
    <?php
    include('footer.php')
    ?>
    <script>
        document.getElementById("complaintForm").addEventListener("submit", function (event) {
            event.preventDefault(); // Prevent default form submission

            // Collect form data
            var formData = new FormData(this);

            // Create an AJAX request
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "dbcalls/submit_complaint.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Request successful
                        document.getElementById("complaintMessage").innerHTML = "klacht verstuurd";
                        // Clear form fields
                        document.getElementById("complaintForm").reset();
                    } else {
                        // Request failed
                        console.error("Request failed:", xhr.statusText);
                    }
                }
            };

            // Send the form data
            xhr.send(formData);
        });

        document.getElementById("contactForm").addEventListener("submit", function (event) {
            event.preventDefault(); // Prevent default form submission

            // Collect form data
            var formData = new FormData(this);

            // Create an AJAX request
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "dbcalls/submit_contact.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Request successful
                        document.getElementById("contactMessage").innerHTML = "contact verzoek verstuurd";
                        // Clear form fields
                        document.getElementById("contactForm").reset();
                    } else {
                        // Request failed
                        console.error("Request failed:", xhr.statusText);
                    }
                }
            };

            // Send the form data
            xhr.send(formData);
        });
    </script>
</body>

</html>
