<?php
    session_start();
    if(isset($_SESSION['userId'])){header("location: ./dashboard.php");}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/login.css">
    <title>LogIn</title>
</head>

<body>

    <div class="container">
        <div class="right">
            <h1 class="largeTxt">
                Sign In to your <br> Dashboard
            </h1>
        </div>
        <div class="left">


            <div class="login--form">
                <div class="message">
                    <?php
                    if (isset($_SESSION['status'])) {
                        if ($_SESSION['status']['code'] == 200) {
                            echo "<p class='success'>" . $_SESSION['status']['statusMsg'] . "</p>";
                        } else if ($_SESSION['status']['code'] == 400) {
                            echo "<p class='error'>" . $_SESSION['status']['statusMsg'] . "</p>";
                        }
                    }


                    ?> </div>
                <h1 class="medTxt">SignIn</h1>
                <form action="../model/login-help.php" method="POST">
                    <div class="form--group">
                        <!-- <label for="uname">Username</label> -->
                        <input type="text" placeholder="@username" name="username" id="uname">
                    </div>
                    <div class="form--group">
                        <!-- <label for="password">Username</label> -->
                        <input type="password" placeholder="password" name="password" id="password">
                    </div>

                    <div class="form--group">
                        <button class="btn" name="submit" type="submit">Sign In</button>
                    </div>
                    <div class="form--group">
                        <a href="./signup.php">Create a New account</a>
                    </div>

                </form>
            </div>
        </div>
    </div>


</body>

</html>