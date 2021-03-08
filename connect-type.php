<?php




try{
    $connexion= new PDO(
        'my_sql:host=localhos:3306;dbname=securev1',
        'root',
        ''
    );
    $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}

catch(Exception $e){
    echo $e -> getMessage();
}