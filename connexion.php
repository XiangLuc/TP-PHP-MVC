<?php

class Connexion {

    protected static $bdd;
    
    public static function init_Connexion() {
   
        $dsn = "mysql:host=localhost;dbname=butinfo";
        $username = "butinfo";
        $password = "1234";
        
        try {
            self::$bdd = new PDO($dsn, $username, $password);
        }catch(PDOException $e) {
            die("Error: ".$e->getMessage());
        }
    }
}

?>