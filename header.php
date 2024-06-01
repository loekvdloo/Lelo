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
            <a href="index.php"><img src="assets/img/logo.png" alt="logo" id="logoheader"></a>
        </div>
        <nav>
            <div class="knopheader" id="tripinfoknop">
                <a href="voorgesteldereizen.php">trip info</a>
            </div>
            <div class="knopheader" id="tripinfoknop">
                <a href="test.php">contact</a>
            </div>
            <div class="knopheader" id="aboutusknop">
                <a href="over_ons.php">About us</a>
            </div>

            <?php
            session_start();
            if (isset($_SESSION['user_id'])) {
                // If logged in, don't show the login button
            } else {
                // If not logged in, show the login button
                echo '<div class="knopheader" id="tripinfoknop"><a onclick="document.getElementById(\'id01\').style.display=\'block\'" style="width:auto;">login</a></div>';
            }
            ?>

            <?php
            if (isset($_SESSION['user_id'])) {
                // If logged in, show the logout button
                echo '<div class="knopheader" id="tripinfoknop"><a href="dbcalls/logout.php">Logout</a></div>';
            } else {
                // If not logged in, don't show the logout button
            }
            ?>
        </nav>
    </div>

    <div class="buttomheaderresponsive" style="background-image: url('assets/img/header_img.png');">
        <div class="logoheader">
            <a href="index.php"><img src="assets/img/logo.png" alt="logo" id="logoheader"></a>
        </div>
        <div id="myNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"
            >&times;</a
            >
            <div class="overlay-content">
                <a href="voorgesteldereizen.php">trip info</a>
                <a href="contact.php">contact</a>
                <a href="test.php">About us</a>
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


</header>
</body>
</html>
