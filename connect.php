<?php

//lancement d'une exception
try{
    /*création d'une nouvelle variable "connexion" instenciée
comme nouvel objet de la classe PDO (PHP DATA OBJECT)*/
    $connexion = new PDO(
        'mysql:host=localhost:3306;dbname=login_data',
        'root',
        ''
    );

    $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

}
/*définition d'une réaction à l'exception
(ici la variable "e" qui corespond à une erreur )*/
catch(Exception $e){
    echo $e->getMessage();
}