<?php

class DatabaseManager
{

    protected static $databaseConnexion;


    public function createInstance()
    {
        if (!self::$databaseConnexion) {
            try {
                
                $db = new PDO("mysql:host=192.168.1.3;metacharset=UTF-8;dbname=mglsi_news1;port=3306", "victorine", "passer");

                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$databaseConnexion = $db;
            } catch (Exception $e) {
                die("Erreur" . $e->getMessage());
            }
        }

        return self::$databaseConnexion;
    }
}
