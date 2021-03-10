<?php

require_once("connect.php");
require_once("Controller.php");
require_once("MyError.php");

//ouverture de la session utilisateur
session_start();

/*création d'une variable "controller" 
correspondant à un objet Controller*/
$controller = new Controller($connexion);
/*création d'une variable "name" corespondant à une valeur string 
entrée par l'utilisateur dans l'input html "username"utilisant
la méthode POST*/
/*On défini le format désiré de la variable "name" en utilisant des FILTER*/
$name = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);


/*Si la variable "name" est valide*/
if (is_string($name)) {
/*création d'une variable "pwd" corespondant à une valeur string 
entrée par l'utilisateur dans l'input html "password"utilisant
la méthode POST*/
/*On défini le format désiré de la variable "pwd" en utilisant des FILTER*/
    $pwd =  filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
/*création d'une variable "token"*/
/*On défini le format désiré de la variable "name" en utilisant des FILTER*/
    $token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);

    $user = $controller->getUser($name);


    if (is_array($user)){

        if ( $controller->verifyPassword($pwd)){

            if (hash_equals($_SESSION['token'], $token)){

            $_SESSION['user'] = $user;
            header("Location:index.php");
            

        } else {

            $_SESSION['error']->setError(-8, "Identification incorrecte, veuillez réessayer !");
            header("Location:index.php");

        } 

    } else {
        $_SESSION['error']->setError(-5, "Identification incorrecte, veuillez réessayer !");
        header("Location:index.php");
    }
}

}