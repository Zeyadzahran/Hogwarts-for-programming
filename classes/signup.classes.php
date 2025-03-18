<?php

require("dbh.classes.php");


class Signup extends Dbh{

    protected function checkUser($username,$email) // checks if a user exist in a database 
    {
        $query = 'SELECT username from users where username = ? or email = ?;';

        $stmt = $this->connect()->prepare($query);
        if(!$stmt->execute([$username,$email])){
            $stmt = null ;
            header("location: ../index.php?error=statmentFailed");
            exit();
        }
        return $stmt->rowCount() > 0; // means  we have user :) ?
    }
    
    protected function setUser($username,$password,$email) {
        
        $query = 'insert into users(username,password,email) values(?,?,?);';

         $stmt = $this->connect()->prepare($query); 
         if(!$stmt->execute([$username,$password,$email])){
             header("location: ../index.php?error=statmentFailed");
             exit();   
         }
            
            $stmt = null ;
           
    }
    
}