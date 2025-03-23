<?php

require "../classes/dbh.classes.php";

class user extends Dbh{

    public function getuser($id)
    {
        $query = "select 
                    u.id, u.name, u.email,  
                    h.name as house_name, 
                    w.name as wand_name
                  from user u
                  left join House h on u.house_id = h.id
                  left join Wand w on u.wand_id = w.id
                  where u.id = ?";

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
        $query = "select 
            course.name AS course_name, 
            Enrollment.degree, 
            Professor.name as professor_name
            FROM Enrollment
            join course on Enrollment.course_id = Course.id
            join User as Professor on Course.professor_id = Professor.id
            where Enrollment.student_id = ?;";
            
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
    public function getPoints()
    {
        $query = "SELECT SUM(degree) AS total_degree FROM Enrollment WHERE student_id = ?;";
        $stmt =$this->connect()->prepare($query);
        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ../src/login.php?error=statementfailed");
            exit();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
}