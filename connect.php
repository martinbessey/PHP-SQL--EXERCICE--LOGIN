<?php

//lancement d'une exception
try{
/*création d'une nouvelle variable "connexion" instenciée
comme nouvel objet de la classe PDO (PHP DATA OBJECT)*/
    $connexion = new PDO(
        'mysql:host=localhost:3306;dbname=login_data',//PDO(mysql:host=server:port, dbname=database, username, password)
        'root',
        ''
    );
/*Configuration de l'attribut PDO*/
    $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
/*PDO::ATTR_DEFAULT_FETCH_MODE = définit*/
/*PDO::FETCH_ASSOC = définit*/

}
/*définition d'une réaction à l'exception
(ici la variable "e" qui correspond à une erreur )*/
catch(Exception $e){
    echo $e->getMessage();
}