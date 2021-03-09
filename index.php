<?php
//le fichier MyError est requis
require_once("MyError.php");
//ouverture de la session utilisateur
session_start();
/*création d'un token (chaîne de caractères aléatoires) 
permetant de se prémùunir de la faille CSRF*/
$_SESSION["token"] = bin2hex(random_bytes(32));

/*si l'ouverture de la session , création d'un nouvel objet 'My Error' 
renvoyant au fichier MyError.php*/
if (!isset($_SESSION['error']))
$_SESSION['error'] = new MyError();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./CSS//loginstyle.css" rel="stylesheet"  type="text/CSS">
    <title>Big Band</title>
</head>
<body class="nomargin">
    <main class="fullwidth flex ycenter xcenter"> 
        <a href="#" class="logo"><img src="../IMG/logo blanc.png"></a>
        <span class="sign-in">New on BigBand? <a href="sign-in.php">Sign in here</a></span>
        <div class="flex column">
            <h2>Login and stay in tune!</h2><br>
           
           <!--création d'un paragraphe spécifique conprenant un message d'erreur
et s'affichant si la connexion à la BDD échoue-->
<!--<p id="error" type="hidden">
        <?php
            /*if(isset($_GET['error'])){
                echo "<strong>".$_SESSION['error']."</strong>";
            }*/
        ?>
    </p>-->
            <form method="post" action="login.php" class="flex column ycenter ">                
                <input type="username" name="username" id="username" placeholder="username..." required>
                <input type="password" name="password" id="password" placeholder="your password..." required>
                <input type="hidden" value="<?= $_SESSION["token"]?>"  name="token">
                <input type="submit" placeholder="login" value="Login"> 
            </form>
                 
            <small>Forget your password ?<a href="#"> Click here.</a></small>
        </div>       
    </main>
    <footer class="fullwidth flex ycenter xcenter">
        <small> © Copyright made by Martin Bessey alll rights reserved 2021</small>
    </footer>
</body>
</html>