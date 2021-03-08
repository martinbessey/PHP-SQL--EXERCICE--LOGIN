<?php

require_once("connect-type.php");
require_once("Controler.php");
require_once("MyError.php");

session_start();

$controller = new Controller($connection);
   //protéger le champs de formulaire (faille XSS)

   $name = htmlentities(trim($_POST['username']));

   $name =filter_input(INPUT_POST,'username', FILTER_VALIDATE_REGEXP,[
       "option"=>[
          "regexp"=>'#^[A-Za-z][A-Za-z0-9_-]{5,31}$#'
        ]
    ] );

    if (is_string($name)){
        $pwd1 = filter_input_POST, 'password', FILTER_VALIDATEREGEXP[
            "options" => [
                "regexp" => '#^*(?=,}8,63})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[Â-Za-z0-9]).*$#'
            ]
        ]);
     if (is_string($pwd1)){

        $user = $controller->getUser($name);
        
        if (is_array($user)){

            $_SESSION['error']->setError (-3, "Cet idantifiant est deja pris");
            header("Location:sign-in.php?error");


        }else{
            $pwd2 = filter_input(INPUT_POST, 'verifpassword', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);

            if ($pwd1 ===$pwd2){


                $statut = $controller->addUser(strtolower($name), password_hash($pwd1,PASSWORD_ARGON2I);

                if($statut){
                    header("Location:index.php");

                }
            }else{

                $_SESSION['error']->setError (-6, "Erreur inconnue");
                header("Location:sign-in.php?error");
            }
        }else{
            
            $_SESSION['error']->setError (-4, "Les deux mots de passe ne corespoondent pas");
            header("Location:sign-in.php?error");

        }
    }else{

        $_SESSION['error']->setError (-2, "Erreur inconnue");
        header("Location:sign-in.php?error");

     }
    
    
    }
?>