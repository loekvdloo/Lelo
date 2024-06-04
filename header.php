<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Lelo</title>
    <style>

    </style>
</head>
<body>

<header>
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
                <a href="over_ons.php">About us</a>
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
                <a href="contact.php">contact</a>
            </div>
            <div class="knopheader" id="aboutusknop">
                <a href="over_ons.php">About us</a>
            </div>

            <?php
            if (isset($_SESSION['user_id'])) {
                echo '
                <div class="dropdown">
                    <div class="knopheader" id="profileknop"><a onclick="toggleDropdown()">Profile</a></div>
                    <div class="dropdown-content" id="profileDropdown">
                        <span class="close" onclick="closeDropdown(event)">&times;</span>';
                echo '<p>User ID: ' . $_SESSION['user_id'] . '</p>';
                echo '<p>Name: ' . $_SESSION['firstname'] . '</p>';
                echo '<p>Email: ' . $_SESSION['email'] . '</p>';
                echo '</div>
                </div>';
            } else {
                echo '<div class="knopheader" id="tripinfoknop"><a onclick="document.getElementById(\'id01\').style.display=\'block\'" style="width:auto;">login</a></div>';
            }

            if (isset($_SESSION['user_id'])) {
                echo '<div class="knopheader" id="tripinfoknop"><a href="dbcalls/logout.php">Logout</a></div>';
            }
            ?>
        </nav>
    </div>

    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById("profileDropdown");
            if (dropdown.style.display === "block") {
                dropdown.style.display = "none";
            } else {
                dropdown.style.display = "block";
            }
        }

        function closeDropdown(event) {
            event.stopPropagation();
            document.getElementById("profileDropdown").style.display = "none";
        }

        window.onclick = function (event) {
            if (!event.target.matches('#profileknop a')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.style.display === "block") {
                        openDropdown.style.display = "none";
                    }
                }
            }
        }
    </script>
</header>
</body>
</html>
