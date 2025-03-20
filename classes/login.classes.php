<?php
require("dbh.classes.php");

class Login extends Dbh {
    protected function getUser($username, $pwd) {
        $query = 'SELECT * FROM user WHERE name = ? OR email = ?;';
        
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

       
    
        if ($user["password"] == $pwd) {
            session_start();
            $_SESSION["id"] = $user["id"];
            $_SESSION["Role"] = $user["role"];
            if ($user["Role"] == "admin") {
                header("Location: ../admin/dashboard.php");
                exit();
            }else{
                 header("Location: ../admin/dashboard.php");
                exit();
            }
           
        } else {
            $stmt = null;
            header("location: ../login.php?error=wrongpassword");
            exit();
        }
    }


}
?>