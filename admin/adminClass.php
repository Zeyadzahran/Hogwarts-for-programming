<?php
require_once __DIR__ . "/../classes/dbh.classes.php";

class admin extends Dbh{

    public function updateRole($id)
    {
        $query = "UPDATE User SET role ='Admin' , house_id = NULL WHERE id = ? ;";
        $stmt = $this->connect()->prepare($query);
        if (!$stmt->execute([$id])) {
            $stmt = null ;
            header("location: /professor/manageUsers?error=failedToUpdateRole");
            exit();
            return false;
        }
        return true;
    }

    public function addHousePoints($houseId,$points)
    {
        $query = "UPDATE house SET points = points + ? WHERE id = ? ;";
        $stmt = $this->connect()->prepare($query);
        if (!$stmt->execute([$points, $houseId])) {
            header("location: ../coursee.php?error=statementfailed");
            exit();
        }
        return true;
    }

    public function getStudentPoints($id)
    {
        $query = "SELECT SUM(Marks) AS totalMark FROM Enrollment WHERE student_id = ?;";
        $stmt =$this->connect()->prepare($query);
        if (!$stmt->execute([$id])) {
            $stmt = null;
            header("location: /login?error=statementfailed");
            exit();
        }
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteUser($id)
    {
        $user = $this->getuser($id);
        $points = (-1 * ($this->getStudentPoints($id)["totalMark"]));
        $this->addHousePoints($user["house_id"],$points);
        $query= "DELETE FROM User WHERE id = ?";
        $stmt = $this->connect()->prepare($query);
        if (!$stmt->execute([$id])) {
            $stmt = null;
            header("location: /professor/manageUsers?error=failedToDeleteUser");
            exit();
            return false;
        }
        return true;
    }

    public function getuser($id)
    {
        $query = "SELECT 
                    u.id, u.name, u.email, u.role, u.house_id,
                    w.name as wand_name
                  FROM user u
                  LEFT JOIN Wand w on u.wand_id = w.id
                  WHERE u.id = ?";

        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute([$id])) {
            $stmt = null;
            header("location: /login?error=statementfailed");
            exit();
        }

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function GetUsers($id)
{
        if($id==1){
            $query="SELECT  User.id, 
                        User.name, 
                        User.email, 
                        user.role,
                        Wand.name AS wand_name,
                        House.name AS house_name
                            FROM User
                        JOIN Wand ON User.wand_id = Wand.id
                        LEFT JOIN House ON User.house_id = House.id 
                        WHERE User.id > 1;";
        }else{
            $query = "SELECT  User.id, 
            User.name, 
            User.email, 
            user.role,
            Wand.name AS wand_name, 
            House.name AS house_name
                FROM User
            JOIN Wand ON User.wand_id = Wand.id
            LEFT JOIN House ON User.house_id = House.id
            WHERE User.role = 'Student';";
        }
      
        
        $stmt = $this->connect()->prepare($query);
        
        if(!$stmt->execute()){
            $stmt = null ;
            header("location: /professor/manageUsers?error=failedToDeleteUser");
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
                header("location: /professor/manageCourses?error=failedToGetCourses");
                exit();
            }
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $query = "SELECT 
            Course.id AS id, 
            Course.name AS name, 
            User.name AS professor_name 
          FROM Course
          JOIN User ON Course.professor_id = User.id
          WHERE Course.professor_id = ?;";


            $stmt = $this->connect()->prepare($query);

            if (!$stmt->execute([$id])) {
                $stmt = null;
                header("location: /professor/manageCourses?error=failedToGetCourses");
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
            header("location: /professor/dashboard?error=FailedToGetHouses");
            exit();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function addquiz($quizname,$courseid,$points)
    {
        $query1 = "UPDATE Course SET havequiz = TRUE WHERE id= ?";
        $query2 = "INSERT INTO Quiz(name,course_id,points) VALUES(?,?,?)";
        $stmt1 = $this->connect()->prepare($query1);
        $stmt2 = $this->connect()->prepare($query2);
        
        if (!($stmt1->execute([$courseid]) && $stmt2->execute([$quizname,$courseid,$points]))) {
            $stmt = null;
            header("location: /professor/manageCourses?error=FailedToAddQuiz");
            exit();
        }
        return $stmt1->fetchAll(PDO::FETCH_ASSOC) && $stmt2->fetchAll(PDO::FETCH_ASSOC) ;
    }

    
    public function getfreeCourse() {
        $query = "SELECT 
                    Course.name AS course_name,  
                    Course.id AS course_id
                  FROM Course
                  WHERE Course.professor_id IS NULL;";
        
        $stmt = $this->connect()->prepare($query);
    
        if (!$stmt->execute()) {
            $stmt = null;
            header("location: /professor/dashboard?error=statementfailed");
            exit();
        }
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addcourse($userId,$courseId){
        $query = "UPDATE Course SET professor_id = ? WHERE id = ? AND professor_id IS NULL";

        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute([$userId,$courseId])){
            $stmt=NULL;
            return false;
            header("location: /professor/dashboard?error=failed");
            exit();
        }
        return true;
    }

    public function addnewcourse($coursename,$professorname){
        
        $query1 = "INSERT INTO Course (name) VALUES (?);";
        $query2 = "INSERT INTO Course (name,professor_id) VALUES(?,?);";
        $query3 = "SELECT id FROM User WHERE name = ?";      

        if(empty($professorname)){
            $stmt = $this->connect()->prepare($query1);
            if (!$stmt->execute([$coursename])){
                $stmt=NULL;
                header("location: /professor/manageCourses?error=failed");
                exit();
            }
            return $stmt->fetch(PDO::FETCH_ASSOC);

        }else{
            $stmt1 = $this->connect()->prepare($query3);
            if (!$stmt1->execute([$professorname])){
                $stmt1=NULL;
                header("location: /professor/manageCourses?error=failed");
                exit();
            }
        $professor_id=$stmt1->fetch(PDO::FETCH_ASSOC)["id"];

           if($stmt1->rowCount()>0){
               $stmt2 = $this->connect()->prepare($query2);
                if (!$stmt2->execute([$coursename, $professor_id])){
                    $stmt2=NULL;
                    header("location: /professor/manageCourses?error=failed");
                    exit();
                }
            }
            return $stmt2->fetchAll(PDO::FETCH_ASSOC);           
        }
    }

    public function getQuizId($quizname)
    {
        $query= "SELECT id FROM Quiz WHERE name = ?"; 

        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute([$quizname])){
            $stmt=NULL;
            header("location: /professor/addquestion?error=failedToAddQuestion");
            exit();
        }
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }
    public function addquestion($quiz_id,$question,$choice_a,$choice_b,$choice_c,$choice_d,$correct)
    {
        $query= "INSERT INTO questions (quiz_id, question_text, option1, option2, option3, option4, correct)
                VALUES (?, ?, ?, ?, ?, ?, ?)"; 

        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute([$quiz_id,$question,$choice_a,$choice_b,$choice_c,$choice_d,$correct])){
            $stmt=NULL;
            header("location: /professor/addquestion?error=failedToAddQuestion");
            exit();
        }
        return true; 
    }
    

}

?>
