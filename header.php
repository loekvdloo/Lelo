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
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 200px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            padding: 12px 16px;
            border: 1px solid #ccc;
        }

        .dropdown-content p {
            margin: 10px 0;
        }

        .dropdown-content .close {
            color: #aaa;
            float: right;
            font-size: 20px;
            cursor: pointer;
        }

        .dropdown-content .close:hover,
        .dropdown-content .close:focus {
            color: black;
            text-decoration: none;
        }
    </style>
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
        // Function to toggle the profile dropdown
        function toggleDropdown() {
            var dropdown = document.getElementById("profileDropdown");
            if (dropdown.style.display === "block") {
                dropdown.style.display = "none";
            } else {
                dropdown.style.display = "block";
            }
        }

        // Function to close the dropdown
        function closeDropdown(event) {
            event.stopPropagation();
            document.getElementById("profileDropdown").style.display = "none";
        }

        // Close the dropdown if the user clicks outside of it
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
