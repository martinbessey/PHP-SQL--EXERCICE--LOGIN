<?php

require_once("MyError.php");
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS//signinstyle.css" type="text/css">
    <title>Béhance sign-in</title>
</head>

<body class="nomargin">
    <main class="fullwidth flex ycenter xcenter">
        <a href="#" class="logo"><img src="./IMG//Behance-Logo.wine.png"></a>
        <span class="sign-in">Already on Béhance? <a href="index.php">Log in here</a></span>
        <p id="error">
            <?php
            if (isset($_GET['error'])) {
                echo "<strong>" . $_SESSION['error'] . "</strong>";
            }
            ?>
        </p>
        <div class="flex column">
        <h2>Please sign-in</h2>

        <form action="add-user.php" method="post" class="flex column ycenter ">
            <input type="username" name="username" id="username" placeholder="username..." required>
            <input type="password" name="password" id="password" placeholder="your password..." required>
            <input type="password" id="password" placeholder="Confirmez votre mot de passe" name="verifpassword" required>
            
            <input type="hidden" value="<?= $_SESSION["token"] ?>" name="token">
            <input type="submit" placeholder="login" value="Login">
        </form>
        </div>
    </main> 
    <footer class="fullwidth flex ycenter xcenter">
             <small> © Copyright made by Martin Bessey alll rights reserved 2021</small>
        </footer>
</body>
</html>