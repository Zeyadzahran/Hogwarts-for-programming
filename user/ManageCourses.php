<?php

require "userClass.php";
session_start();

$userId = $_SESSION['id'];

$obj = new user();
$courses = $obj->getAllCourse($userId);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <style>
        body {
            background: linear-gradient(rgba(11, 26, 53, 0.7), rgba(11, 26, 53, 0.7)),
                url('../Styles/user.webp') no-repeat center center fixed;
            background-size: cover;
            color: #c9b78b;
            font-family: "Fira Code", monospace;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            text-align: center;
            flex-direction: column;
        }

        .user-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background-color: rgba(201, 183, 139, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .user-table th,
        .user-table td {
            border: 1px solid #c9b78b;
            padding: 15px;
            text-align: center;
        }

        .user-table th {
            background-color: #162b58;
            color: #c9b78b;
            font-size: 1.1rem;
        }

        .user-table tr:nth-child(even) {
            background-color: rgba(201, 183, 139, 0.2);
        }

        .Assigne {
            display: inline-block;
            padding: 10px 15px;
            background-color: #2174ae;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .Assigne:hover {
            background-color: #A67C52;
            transform: scale(1.1);
        }

        .Assigne:active {
            transform: scale(0.95);
        }
    </style>
</head>

<body>
    <div class="userbk">
        <div class="dashboard-container">
            <h2>Hogwarts Courses</h2>
            <div class="dashboard-menu">
                <table class="user-table">
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Professor Name</th>
                            <th>Add</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($courses as $course) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($course['course_name']); ?></td>
                                <td><?php echo htmlspecialchars($course['professor_name']); ?></td>
                                <td>
                                    <div text-align="center">
                                        <a href="assignCourse.php?course_id=<?php echo $course['course_id']; ?>" class="Assigne">
                                            Assign The Course
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php require "sidePanal.php" ?>

</body>

</html>