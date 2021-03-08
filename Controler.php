<?php
class Controller{



    public function __construct($connection){
        $this->_connection = $connection;
    }  

    public function getUser($uname){

        try{
            $sql = "SELECT username, password FROM user WHERE username = LOWER(:name)";

            //preparation de la requete dans le serveur elle ne serat pas encore executée
    
            $statement = $this ->_connection->prepare($sql);
       

            //injection des parametres

            $statement->bindParam("name", $uname);
       
            //execute la requete
            $statement-> execute ();
       
            //on récupère l'utilisateur en base de donnée

            $this->_user = $statement->fetch();

            return $this->_user;
        }

    
        catch(Exception $e){
            return $e->getMessage();
        }

    }
 
}