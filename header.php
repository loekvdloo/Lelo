<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Lelo</title>
</head>
<body>

<header>
    <div class="topheader"></div>
    <div class="buttomheader" style="background-image: url('assets/img/header_img.png');">
        <div class="logoheader">
        <img src="assets/img/logo.png">
        </div>
        <nav>
            <div class="knopheader" id="tripinfoknop">
                <a href="#">trip info</a>
            </div>
            <div class="dropdown">
                <button class="dropbtn">contact</button>
                <div class="dropdown-content">
                    <a href="#"><img src="assets/img/phone_homepagina.png">+31 6 2540784</a>
                    <a href="#"><img src="assets/img/email_homepagina.png">info.lelobusiness@gmail.com</a>
                    <a href="#"><img src="assets/img/klachten_homepagina.png">klachtenformulier</a>
                </div>
            </div>
            <div class="knopheader" id="aboutusknop">
                <a href="#">About us</a>
            </div>

            <div class="knopheader" id="tripinfoknop">
                <a onclick="document.getElementById('id01').style.display='block'" style="width:auto;">login</a>
            </div>
        </nav>
    </div>
<<<<<<< homepage
=======
    <div class="buttomheaderresponsive" style="background-image: url('assets/img/header_img.png');">
        <div class="logoheader">
            <a href="index.php"><img src="assets/img/logo.png" alt="logo" id="logoheader"></a>
        </div>
        <div id="myNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"
            >&times;</a
            >
            <div class="overlay-content">
                <a href="#">trip info</a>
                <a href="contact.php">contact</a>
                <a href="gevondenreis.php">About us</a>
                <a onclick="document.getElementById('id01').style.display='block'" style="width:auto;">login</a>
            </div>
        </div>
        <span
                id="bar"
                style="font-size: 30px; cursor: pointer"
                onclick="openNav()"
        >&#9776;
    </span>

        <script>
            function openNav() {
                document.getElementById("myNav").style.width = "100%";
            }

            function closeNav() {
                document.getElementById("myNav").style.width = "0%";
            }
        </script>
    </div>


>>>>>>> local
</header>
</body>
</html>