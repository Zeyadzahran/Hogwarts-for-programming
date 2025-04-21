<?php

    require("dbh.classes.php");


    class Edit extends Dbh{

        protected function checkUser($id) // checks if a user exist in a database 
        {
            $query = 'SELECT name from user where id = ?;';

            $stmt = $this->connect()->prepare($query);
            if(!$stmt->execute([$id])){
                $stmt = null ;
                header("location: /login?error=statmentFailed");
                exit();
            }
            return $stmt->rowCount() > 0; // means  we have user :) ?
        }
        
        public function getuser($id)
        {
            $query = "SELECT password , role FROM User WHERE id = ?";

            $stmt = $this->connect()->prepare($query);

            if (!$stmt->execute([$id])) {
                $stmt = null;
                header("location: /login?error=statementfailed");
                exit();
            }

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function updatepassword($id,$newpassword){
            $query = "UPDATE User SET password = ? WHERE id = ?";
            $stmt = $this->connect()->prepare($query);
            if (!$stmt->execute([$newpassword,$id])){
                $stmt = null;
                header("location: editprofile?error=FailedUpdatePassword");
                exit();
            }
        }
        
        public function updateuser($id,$name,$email)
        {
            $query = "UPDATE User SET name = ? , email = ? WHERE id = ?";
            $stmt = $this->connect()->prepare($query);
            if (!$stmt->execute([$name,$email,$id])){
                $stmt = null;
                header("location: editprofile?error=FailedUpdateUser");
                exit();
            }
        }
        
    }