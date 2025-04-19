<?php


require_once(__DIR__ . "/../classes/dbh.classes.php");


class user extends Dbh{

    public function getuser($id)
    {
        $query = "SELECT 
                    u.id, u.name, u.email,u.wand_id,  
                    h.name as house_name,
                    h.id as house_id, 
                    w.name as wand_name
                  FROM user u
                  LEFT JOIN House h on u.house_id = h.id
                  LEFT JOIN Wand w on u.wand_id = w.id
                  WHERE u.id = ?";

        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute([$id])) {
            $stmt = null;
            header("location: ../src/login.php?error=statementfailed");
            exit();
        }

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getCourses($id)
    {
        $query = "SELECT 
                    course_id,
                    havequiz,
                    course.name AS course_name,
                    Enrollment.marks,
                    Professor.name as professor_name
                    FROM Enrollment
                    JOIN Course ON Enrollment.course_id = Course.id
                    JOIN User AS Professor ON Course.professor_id = Professor.id
                    WHERE Enrollment.student_id = ?;";
            
            $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute([$id])) {
            $stmt = null;
            header("location: dashboard.php?error=statementfailed");
            exit();
        }
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getHouses()
    {
        $query = "SELECT name,points FROM house ORDER BY points DESC ,name ASC;";
        $stmt = $this->connect()->prepare($query);
        
        if (!$stmt->execute()) {
            $stmt = null;
            header("location: dashboard.php?error=statementfailed");
            exit();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    // getUserPoints
    public function getStudentPoints($id)
    {
        $query = "SELECT SUM(Marks) AS totalMark FROM Enrollment WHERE student_id = ?;";
        $stmt =$this->connect()->prepare($query);
        if (!$stmt->execute([$id])) {
            $stmt = null;
            header("location: ../src/login.php?error=statementfailed");
            exit();
        }
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public  function getUserItems($id)
    {
        $query = "SELECT i.name, i.description, i.path, o.item_count FROM owneditems o
         JOIN item i ON o.item_id = i.id
          WHERE o.student_id = ?;";

        $stmt = $this->connect()->prepare($query);
        if (!$stmt->execute([$id])) {
            $stmt = null;
            header("location: ../src/login.php?error=statementfailed");
            exit();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getAllCourse($id)
    {

        $query ="SELECT 
        Course.name AS course_name,  
        Course.id AS course_id,  
                Professor.name AS professor_name
            FROM Course
                JOIN User AS Professor ON Course.professor_id = Professor.id
                    WHERE Course.id NOT IN (
                                    SELECT course_id 
                                    FROM Enrollment 
                                    WHERE student_id = ?);";
        $stmt = $this->connect()->prepare($query);

         if (!$stmt->execute([$id])) {
            $stmt = null;
            header("location: dashboard.php?error=statementfailed");
            exit();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addNewCourse($studentId, $courseId)
    {
        $query = "INSERT INTO Enrollment (student_id, course_id, Marks) VALUES (?, ?, ?);";
        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute([$studentId, $courseId, 0])) {
            $stmt = null;
            header("location: dashboard.php?error=statementfailed");
            exit();
        }

        return true; 
    }


    public function getQuizIdByCourse($course_id)
    {
        $query = "SELECT id FROM Quiz WHERE course_id = :course_id";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(':course_id', $course_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    
    }
    
    public function getQuizPoints($quiz_id)
    {
    try {
        $query = "SELECT points FROM Quiz WHERE id = :quiz_id";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(':quiz_id', $quiz_id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['points'] : 0;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
        }
    }

    public function addQuizPoints($student_id,$points,$course_id)
    {
        $points=(int)$points;
        $query = "UPDATE Enrollment SET Marks = Marks + ? WHERE student_id = ? AND course_id = ? ;";
        $stmt = $this->connect()->prepare($query);
        if(!$stmt->execute([$points,$student_id,$course_id]))
        {
            header("location: ../coursee.php?error=statementfailed");
            exit();
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

    public function getEnrollment($student_id,$course_id)
    {
        $query = "select QuizDone,Marks from Enrollment where student_id = ? and course_id = ?";
        $stmt = $this->connect()->prepare($query);

        if(!$stmt->execute([$student_id,$course_id])){
            header("location: ../coursee.php?error=statementfailed");
            exit();
        }
        return $stmt->fetch(PDO::FETCH_ASSOC);

    } 
    public function setDone($student_id, $course_id)
    {
        $query = "UPDATE Enrollment SET QuizDone = true WHERE student_id = ? AND course_id = ?";
        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute([$student_id, $course_id])) {
            header("location: ../coursee.php?error=statementfailed");
            exit();
        }
        return true;
    }

    public function getHousePoints($id)
    {
        $query = "select points from house where id = ? ";
        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute([$id])) {
            header("location: ../coursee.php?error=statementfailed");
            exit();
        }
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getWand($id)
    {
        $query = "select wood,core from wand  where id = ? ";
        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute([$id])) {
            header("location: ../coursee.php?error=statementfailed");
            exit();
        }
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getQuestions($course_id)
    {
        $query = "SELECT 
                    qz.id AS quiz_id,
                    qz.name AS quiz_name,
                    qs.id AS question_id,
                    qs.question_text,
                    qs.option1,
                    qs.option2,
                    qs.option3,
                    qs.option4,
                    qs.correct
                FROM Questions qs
                JOIN Quiz qz ON qs.quiz_id = qz.id
                WHERE qz.course_id = ?;";

        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute([$course_id])) {
            header("location: ../coursee.php?error=statementfailed");
            exit();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}