<?php
//Création d'une noubelle classe Controller
class Controller{

    private $_connection;
    private $_user;

    public function __construct($connection){
        $this->_connection = $connection;
    }  

    public function getUser($uname){

        try{
            $sql = "SELECT username, password FROM user WHERE username = LOWER(:name)";/*LOWER convertit tout les caractèrres 
                                                                                       d'une chaîne en minuscules

            /*Création d'une requête préparée qui permet de se prémunire des injections SQL*/

            //preparation de la requete préparée dans le serveur elle ne serat pas encore executée
           
            $statement = $this ->_connection->prepare($sql);//"prepare" prépare une requête à l'execution d'un objet

       

            //injection des paramètres

            $statement->bindParam("name", $uname);//"bindParam" lie le paramètre "name au nom de variable $uname
                     
            //execute la requete
            $statement-> execute ();//"execute" execute la rquête préparée $statement
       
            //on récupère l'utilisateur en base de donnée

            $this->_user = $statement->fetch();//"fetch" récupère la ligne suivante d'un jeu de résultat PDO

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