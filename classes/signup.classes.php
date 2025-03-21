<?php

require("dbh.classes.php");


class Signup extends Dbh{

    protected function checkUser($username,$email) // checks if a user exist in a database 
    {
        $query = 'SELECT name from user where name = ? or email = ?;';

        $stmt = $this->connect()->prepare($query);
        if(!$stmt->execute([$username,$email])){
            $stmt = null ;
            header("location: ../index.php?error=statmentFailed");
            exit();
        }
        return $stmt->rowCount() > 0; // means  we have user :) ?
    }
    
    protected function setUser($name, $email,$password) { // we still didn't mange the wand_id or house-id 


        // before inserting we will make the logic for assign the wand_id,house_id and i think we must put the names not the id;
        $house_id = 1 ;
        $wand_id = 1 ;

        $query = 'insert into user(name,email,password,house_id,wand_id) values(?,?,?,?,?);';

         $stmt = $this->connect()->prepare($query); 
         if(!$stmt->execute([$name,$email, $password,$house_id,$wand_id])){ // remmember to insert the house and wand data ;
             header("location: ../index.php?error=statmentFailed");
             exit();   
         }
            
            $stmt = null ;
           
    }
    
}