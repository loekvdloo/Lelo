<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Lelo</title>
    <style>
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: white;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        padding: 12px 16px;
    }
    .dropdown-content p {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }
    .dropdown-content .close {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
        font-size: 20px;
    }
</style>
</head>
<body>

<?php
session_start();
?>
<header>
    <div class="buttomheaderresponsive" style="background-image: url('assets/img/header_img.png');">

        <div class="logoheader">
            <a href="index.php"><img src="assets/img/logo.png" alt="logo" id="logoheader"></a>
        </div>
        <div id="myNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="overlay-content">
                <a href="voorgesteldereizen.php">Trip Info</a>
                <a href="contact.php">Contact</a>
                <a href="over_ons.php">About Us</a>
                <a onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</a>
            </div>
        </div>
        <span id="bar" style="font-size: 30px; cursor: pointer" onclick="openNav()">&#9776;</span>

        <script>
            function openNav() {
                document.getElementById("myNav").style.height = "100%";
            }

            function closeNav() {
                document.getElementById("myNav").style.height = "0%";
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
                <a href="voorgesteldereizen.php">Trip Info</a>
            </div>
            <div class="knopheader" id="tripinfoknop">
<<<<<<< HEAD
                <a href="contact.php">contact</a>
=======
                <a href="test.php">Contact</a>
>>>>>>> b448ad532e6645b141be119d08122b329429b277
            </div>
            <div class="knopheader" id="aboutusknop">
                <a href="over_ons.php">About Us</a>
            </div>

            <?php
            if (isset($_SESSION['user_id'])) {
                echo '
                <div class="dropdown">
                    <div class="knopheader" id="profileknop"><a href="javascript:void(0)" onclick="toggleDropdown()">Profile</a></div>
                    <div class="dropdown-content" id="profileDropdown">
                        <span class="close" onclick="closeDropdown(event)">&times;</span>
                        <p>User ID: ' . $_SESSION['user_id'] . '</p>
                        <p>Name: ' . $_SESSION['firstname'] . '</p>
                        <p>Email: ' . $_SESSION['email'] . '</p>
                    </div>
                </div>';
            } else {
                echo '<div class="knopheader" id="tripinfoknop"><a href="javascript:void(0)" onclick="document.getElementById(\'id01\').style.display=\'block\'" style="width:auto;">Login</a></div>';
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
            dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
        }

        function closeDropdown(event) {
            event.stopPropagation();
            document.getElementById("profileDropdown").style.display = "none";
        }

        window.onclick = function(event) {
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
