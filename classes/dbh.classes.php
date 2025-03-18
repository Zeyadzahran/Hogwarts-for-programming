<?php

class Dbh{

    protected function connect(){

        try {
            // here we made a db connection 
            $dbUsername = "root";
            $dpPassword ="123456";
            $dbh = new PDO("mysql:host=localhost;dbname=loginform", $dbUsername, $dpPassword);
            return $dbh; 
        } catch (PDOException $e) {
             echo " Error ! : " . $e->getMessage() . "<br>";
            die();
        }
    }
}