<?php
require("..\classes\dbh.classes.php");

class SetAdmin extends Dbh {
    public function update($id) {
        $conn = $this->connect();
        $stmt = $conn->prepare("UPDATE User SET role ='Admin' WHERE id = :id"); 
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userId = $_GET['id'];
    
    $setadmin = new SetAdmin();
    
    if ($setadmin->update($userId)) {
        header("Location: manage users.php?success=1");
        exit();
    } else {
        header("Location: manage users.php?errors=couldn't update user role");
        exit();
    }
} else {
    header("Location: manage users.php?errors=User Not Found!");
        exit();
}



?>