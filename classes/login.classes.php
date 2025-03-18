<?php
require("dbh.classes.php");

class Login extends Dbh {
    protected function getUser($username, $pwd) {
        $query = 'SELECT * FROM users WHERE username = ? OR email = ?;';
        
        $stmt = $this->connect()->prepare($query);
        
        if (!$stmt->execute([$username, $username])) {
            $stmt = null;
            header("location: ../index.php?error=statementfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user["isAdmin"]){
            // header to admin page
        }else{
            // header to 
        }
    
        if ($user["password"] == $pwd) {
            session_start();
            $_SESSION["id"] = $user[0]["id"];
            $_SESSION["username"] = $user[0]["username"];
            header("location: ../home.html");
            exit();
        } else {
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }
    }


}
?>