<?php
require "../classes/dbh.classes.php";
class admin extends Dbh{

    public function updateRole($id)
    {
        $query = "UPDATE User SET role ='Admin' WHERE id = ? ;";
        $stmt = $this->connect()->prepare($query);
        if (!$stmt->execute([$id])) {
            $stmt = null ;
            header("location: ../admin/manageUser.php?error=failedToUpdateRole");
            exit();
        }
    }

    public function deleteUser($id)
    {
        $query = "DELETE FROM User WHERE id = ?";
        $stmt = $this->connect()->prepare($query);
        if (!$stmt->execute([$id])) {
            $stmt = null;
            header("location: ../admin/mangeUsers.php?error=failedToDeleteUser");
            exit();
        }
    }

    public function GetUsers()
    {
        $query = "SELECT  User.id, 
                        User.name, 
                        User.email, 
                        Wand.name AS wand_name, 
                        House.name AS house_name
                            FROM User
                        JOIN Wand ON User.wand_id = Wand.id
                        LEFT JOIN House ON User.house_id = House.id
                        WHERE User.role = 'Student';";
        
        $stmt = $this->connect()->prepare($query);
        
        if(!$stmt->execute()){
            $stmt = null ;
            header("location: ../admin/manageUsers.php?error=failedToDeleteUser");
            exit();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // return all users as associative array 
    }

    public function GetCourses($id){

        if($id == 1)
        {
            $query = "SELECT 
                    Course.id AS id, 
                    Course.name AS name, 
                    User.name AS professor_name
                    FROM Course
                    JOIN User ON Course.professor_id = User.id;";

            $stmt = $this->connect()->prepare($query);

            if (!$stmt->execute()) {
                $stmt = null;
                header("location: ../admin/manageCourses.php?error=failedToGetCourses");
                exit();
            }
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{
        $query = "SELECT  Course.id AS id, Course.name AS name FROM Course WHERE Course.professor_id = ?;";

            $stmt = $this->connect()->prepare($query);

            if (!$stmt->execute([$id])) {
                $stmt = null;
                header("location: ../admin/manageCourses.php?error=failedToGetCourses");
                exit();
            }
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }


    public function getHouses()
    {
        $query = "SELECT name,points FROM house ORDER BY points DESC ,name ASC;";
        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ../admin/dashboard.php?error=FailedToGetHouses");
            exit();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
        
}

?>

