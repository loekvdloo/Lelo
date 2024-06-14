<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Lelo</title>
    <link href="assets/css/style.css">
</head>
<body>


<header>
    <div class="buttomheaderresponsive" style="background-image: url('assets/img/header_img.png');">

        <div class="logoheader">
            <a href="index.php"><img src="assets/img/logo.png" alt="logo" id="logoheader"></a>
        </div>
        <img src="assets/img/menu(1).png" id="bar"
             style="font-size: 30px; cursor: pointer"
             onclick="openNav()">
        <div id="myNav" class="overlay">
            <a class="closebtn" onclick="closeNav()"
            >&times;</a
            >
            <div class="overlay-content">
                <a href="voorgesteldereizen.php">Trip Info</a>
                <a href="contact.php">Contact</a>
                <a href="over_ons.php">About Us</a>
                <a onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</a>
            </div>
        </div>


        <script>
            function openNav() {
                console.log("test");
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
                <a href="voorgesteldereizen.php">Trip Info</a>
            </div>
            <div class="knopheader" id="tripinfoknop">

                <a href="contact.php">contact</a>

            </div>
            <div class="knopheader" id="aboutusknop">
                <a href="over_ons.php">About Us</a>
            </div>

            <?php

            if (isset($_SESSION['user_id'])) {
                echo '
                <a href="cart.php" class="button"><img src="assets/img/winkelwagen.png" alt="winkelmandje" id="winkelwageimggevondenreis"></a>
                <div class="dropdown">
                    <div class="knopheader" id="profileknop"><a href="javascript:void(0)" onclick="toggleDropdown()">Profile</a></div>
                    <div class="dropdown-content" id="profileDropdown">
                        <span class="close" onclick="closeDropdown(event)">&times;</span>
                        <p>User ID: ' . $_SESSION['user_id'] . '</p>
                        <p>Name: ' . $_SESSION['firstname'] . '</p>
                        <p>Email: ' . $_SESSION['email'] . '</p>
                        <a href="my_booked_flights.php" class="button">My Booked Flights</a> <!-- Button to view booked flights -->
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
