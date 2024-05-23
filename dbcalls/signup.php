<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Lelo</title>
</head>
<body>
    <?php
    include('dbcalls/connect.php');
    include('dbcalls/register.php');
    ?>
<main>

    <div id="id01" class="modal">

        <form class="modal-content animate" action="dbcalls/login.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="assets/img/logo.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>

                <label for="firstname"><b>First name</b></label>
                <input type="text" placeholder="Enter First name" name="firstname" required>

                <label for="password"><b>Password</b></label>
                <input type="text" placeholder="Enter Password" name="password" required>

                <button type="submit" name="login">Login</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
                <div class="signupknop">
                    <a onclick="document.getElementById('id02').style.display='block'; document.getElementById('id01').style.display='none'" style="width:auto;">Sign Up</a>
                </div>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>

            </div>

        </form>
    </div>
    <div id="id02" class="modal" style="display:none;">
        <span onclick="document.getElementById('id02').style.display='none'" class="close1" title="Close Modal">&times;</span>
        <form class="modal-content" action="dbcalls/register.php" method="POST">
            <div class="container">
                <h1>Sign Up</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>

                <label for="firstname"><b>First name</b></label>
                <input type="text" placeholder="Enter First name" name="firstname" required>

                <label for="lastname"><b>Last name</b></label>
                <input type="text" placeholder="Enter Last name" name="lastname" required>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>

                <label for="password"><b>Password</b></label>
                <input type="text" placeholder="Enter Password" name="password" required>

                <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                <div class="clearfix">
                    <button id="verwijderen" type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                    <button id="toevoegen" type="submit" class="signupbtn" name="register">Sign Up</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</main>

</body>
</html>
