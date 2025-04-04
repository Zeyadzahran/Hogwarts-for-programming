<?php
require_once("dbh.classes.php");

class Login extends Dbh
{
    protected function getUser($username, $pwd)
    {
        $query = 'SELECT * FROM user WHERE name = ? OR email = ?;';
        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute([$username, $username])) {
            $stmt = null;
            header("location: /register?error=statementfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: /register?error=usernotfound");
            exit();
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user["password"] == $pwd) {
            session_start();
            $_SESSION["id"] = $user["id"];
            $_SESSION["name"] = $user["name"];
            $_SESSION["role"] = $user["role"];
            $_SESSION["wand_id"] = $user["wand_id"];
            $_SESSION["house_id"] = $user["house_id"];



            if ($user["role"] == "Admin") {
                // Redirect to professor dashboard
                header("Location: /professor/dashboard");
                exit();
            } else {
                // Redirect to student dashboard
                header("Location: /student/dashboard");
                exit();
            }
        } else {
            $stmt = null;
            header("location: /login?error=wrongpassword");
            exit();
        }
    }
}
