<?php
class Controller{

    private $_connexion;
    private $_user;

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

    public function verifyPassword($upwd){
        sleep(1);
        return password_verify($upwd, $this->_user['password']);
    }
    public function addUser($uname, $upwd){

       try{
           $sql = "INSERT INTO user (username, password) VALUES (:name, :password)";
           
           $statement = $this->_connection->prepare($sql);

           //injection de parametres
           $statement->bindParam("name", $uname);
           $statement->bindParam("pwd", $upwd);

           //executer la requete (retourna toujours "true", car elle déclenchera l'exception "sinon")

           return $statement->execute();
       }
       catch(Exception $e){
           return $e->getMessage();
       }
    }
}