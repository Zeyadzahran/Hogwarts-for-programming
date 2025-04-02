<?php
require("adminClass.php");
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: ../src/login.php?error=FailedInMangeCoursePage");
    exit();
}

$userid = $_SESSION["id"];


$obj = new admin();
$courses = $obj->GetCourses($userid);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/style.css">
    <title>Courses</title>
    <style>
        .courses-container {
            padding: 60px 40px 40px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .courses-title {
            color: #ffcc00;
            text-align: center;
            margin-bottom: 40px;
            font-size: 2.5rem;
            text-shadow: 0 0 10px rgba(255, 204, 0, 0.5);
            position: relative;
        }

        .courses-title::after {
            content: '';
            display: block;
            width: 150px;
            height: 3px;
            background: linear-gradient(90deg, transparent, #ffcc00, transparent);
            margin: 15px auto 0;
        }

        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 30px;
        }

        .course-card {
            background: linear-gradient(145deg, #1a1a2e, #16213e);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease;
            border: 1px solid #3a3a5e;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .course-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #ffcc00, #24aade);
        }

        .course-card::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.05));
            transform: translate(50%, -50%) rotate(45deg);
            z-index: -1;
        }

        .course-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.7);
            border-color: #ffcc00;
        }

        .course-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .course-icon {
            width: 60px;
            height: 60px;
            background-color: rgba(36, 170, 222, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 1.8rem;
            color: #ffcc00;
            border: 2px solid rgba(255, 204, 0, 0.3);
        }

        .course-name {
            color: #ffcc00;
            font-size: 1.4rem;
            margin: 0;
            flex-grow: 1;
        }

        .course-details {
            margin-top: 20px;
        }

        .detail-row {
            display: flex;
            margin-bottom: 12px;
            align-items: center;
        }

        .detail-label {
            color: #c9b78b;
            font-weight: bold;
            width: 100px;
            flex-shrink: 0;
        }

        .detail-value {
            color: #f0e6d2;
            flex-grow: 1;
        }

        .course-actions {
            margin-top: 25px;
            display: flex;
            gap: 10px;
        }

        .quiz-btn {
            flex-grow: 1;
            text-align: center;
            padding: 10px;
            border-radius: 8px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .quiz-btn.enter {
            background: linear-gradient(135deg, #4CAF50, #2E7D32);
            color: white;
        }

        .quiz-btn.no-quiz {
            background: rgba(185, 32, 32, 0.2);
            color: #f0e6d2;
            border: 1px solid #b92020;
        }

        .quiz-btn.enter:hover {
            background: linear-gradient(135deg, #3e8e41, #1B5E20);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(46, 125, 50, 0.4);
        }

        .quiz-btn.no-quiz:hover {
            background: rgba(185, 32, 32, 0.3);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .courses-container {
                padding: 60px 20px 20px;
            }

            .courses-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <?php require "navPar.php"; ?>
    <div class="courses-container">
        <h1 class="courses-title">All Courses</h1>
        <div class="courses-grid">
        <?php if($userid==1):?>
            <div  class="course-card">
                  <div class="course-header">
                        <div class="course-icon">📚</div>
                        <h3 class="course-name"> <a href="newcourse.php">Add New Course</a> </h3>
                   </div>
             </div>       
             <?php endif; ?> 
            <?php foreach ($courses as $course) : ?>
                <div class="course-card">
                    <div class="course-header">
                        <div class="course-icon">📚</div>
                        <h3 class="course-name"><?php echo htmlspecialchars($course['name']); ?></h3>
                    </div>
                    <div class="course-details">
                        <div class="detail-row">
                            <span class="detail-label">Professor:</span>
                            <span class="detail-value"><?php echo htmlspecialchars($course['professor_name']); ?></span>
                        </div>
                        
                    </div>
                    <?php if($userid != 1) : ?>
                        <div class="course-actions">
                            <a href="addquiz.php?id=<?php echo $course['id']; ?>" class="assign-btn">Add Quiz</a>
                        </div>
                    <?php endif ; ?>    
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>