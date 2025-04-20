<?php

require_once("dbh.classes.php");


class Signup extends Dbh
{

    protected function checkUser($username, $email) // checks if a user exist in a database 
    {
        $query = 'SELECT name from user where name = ? or email = ?;';

        $stmt = $this->connect()->prepare($query);
        if (!$stmt->execute([$username, $email])) {
            $stmt = null;
            header("location: /register?error=statmentFailed");
            exit();
        }
        return $stmt->rowCount() > 0; // means  we have user :) ?
    }

    protected function setUser($name, $email, $password)
    {
        $house_id = rand(1, 4);
        $wand_id = rand(1, 24);

        $query = 'insert into user(name,email,password,house_id,wand_id)values(?,?,?,?,?);';

        $stmt = $this->connect()->prepare($query);
        if (!$stmt->execute([$name, $email, $password, $house_id, $wand_id])) { // remmember to insert the house and wand data ;
            header("location: /register?error=statmentFailed");
            exit();
        }

        $stmt = null;
    }
}
