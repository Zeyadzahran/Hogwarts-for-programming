<?php
require("..\classes\dbh.classes.php");

class DeleteUser extends Dbh {
    public function delete($id) {
        $conn = $this->connect();
        $stmt = $conn->prepare("DELETE FROM User WHERE id = :id"); 
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userId = $_GET['id'];
    
    $deleteUser = new DeleteUser();
    
    if ($deleteUser->delete($userId)) {
        header("Location: manage users.php?success=1");
        exit();
    } else {
        header("Location: manage users.php?errors=couldn't delete the user");
        exit();
    }
} else {
    header("Location: manage users.php?errors=User Not Found!");
    exit();
}

?>