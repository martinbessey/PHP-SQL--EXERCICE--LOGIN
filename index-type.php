<?php

session_start();





?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="login2.php" method="post">
        <p><input type="text" placeholder="votre login" name="username" require></p>
        <p><input type="password" placeholder="Votre mot de passe" name="password" required></input></p>
        <p><input type="hidden" name="token"></input> </p>
        <p><input type="submit" placeholder="Connexion"></input></p>
    </form>
</body>

</html>