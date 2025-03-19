<?php
require("dbh.classes.php");

class Login extends Dbh {

    protected $user;

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

        $this->user = $stmt->fetch(PDO::FETCH_ASSOC);
       
        if ($this->user["password"] == $pwd) {

            session_start();
            $_SESSION["user_id"] = $this->user["id"];
            $_SESSION["username"] = $this->user["username"];
            $_SESSION["role"] = $this->user["role"];
            if ($this->user["role"] === "Admin") {
                header("Location: ../admin/dashboard.php");
                exit();
            } else {
                header("Location: ../user/index.php");
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