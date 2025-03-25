<?php
require "../classes/dbh.classes.php";
class admin extends Dbh{

    public function updateRole($id)
    {
        $query1 = "UPDATE User SET role ='Admin' WHERE id = ? ;";
        $query2 = "UPDATE User SET house_id = NULL WHERE id = ? ;";
        $stmt1 = $this->connect()->prepare($query1);
        $stmt2 = $this->connect()->prepare($query2);
        if (!($stmt1->execute([$id]) && $stmt2->execute([$id]))) {
            $stmt1 = null ;
            $stmt2 = null;
            header("location: ../admin/manageUser.php?error=failedToUpdateRole");
            exit();
        }
    }

    public function deleteUser($id)
    {
        $query1 = "DELETE FROM Enrollment WHERE student_id = ?";
        $query2 = "DELETE FROM User WHERE id = ?";
        $stmt1 = $this->connect()->prepare($query1);
        $stmt2 = $this->connect()->prepare($query2);
        if (!($stmt1->execute([$id]) && $stmt2->execute([$id]))) {
            $stmt1 = null;
            $stmt2 = null;
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

    public function addquiz($quizname,$courseid,$points)
    {
        $query1 = "UPDATE Course SET havequiz = TRUE WHERE id= :courseid";
        $query2 = "INSERT INTO Quiz(name,course_id,points) VALUES(:quizname,:courseid,:points)";
        $stmt1 = $this->connect()->prepare($query1);
        $stmt1->bindParam(':courseid', $courseid, PDO::PARAM_INT);
        $stmt2 = $this->connect()->prepare($query2);
        $stmt2->bindParam(':quizname', $quizname, PDO::PARAM_STR);
        $stmt2->bindParam(':courseid', $courseid, PDO::PARAM_INT);
        $stmt2->bindParam(':points', $points, PDO::PARAM_INT);
        
        if (!($stmt1->execute() && $stmt2->execute())) {
            $stmt = null;
            header("location: ../admin/manageCourses.php?error=FailedToAddQuiz");
            exit();
        }
        return $stmt1->fetchAll(PDO::FETCH_ASSOC) && $stmt2->fetchAll(PDO::FETCH_ASSOC) ;
    }
    
}

?>
