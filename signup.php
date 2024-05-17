<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Lelo</title>
</head>
<body>
<main>

    <div id="id01" class="modal">

        <form class="modal-content animate" action="/action_page.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="assets/img/logo.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname">

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw">
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
                <button type="submit" id="inloggenknop">Login</button>

                <div class="signupknop">
                    <a onclick="document.getElementById('id02').style.display='block';  document.getElementById('id01').style.display='none'"
                       style="width:auto;">Sign Up</a>
                </div>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">
                    Cancel
                </button>
                <span class="psw">Forgot <a href="#">password?</a></span>

            </div>

        </form>
    </div>
    <div id="id02" class="modal" style="display:none;">
        <span onclick="document.getElementById('id02').style.display='none'" class="close1"
              title="Close Modal">&times;</span>
        <form class="modal-content" action="/action_page.php">
            <div class="container">
                <h1>Sign Up</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

                <label>
                    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                </label>

                <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                <div class="clearfix">
                    <button id="verwijderen" type="button"
                            onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel
                    </button>
                    <button id="toevoegen" type="submit" class="signupbtn">Sign Up</button>
                </div>
            </div>
        </form>
    </div>



</main>

</body>
</html>
