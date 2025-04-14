<?php
if (isset($_GET['id'])) {
    $courseid = $_GET['id'];
}
$questionCount = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Quiz</title>
    <link rel="stylesheet" href="../../../Styles/style.css">
    <style>
        body {
            font-family: "Fira Code", monospace;
            background: linear-gradient(rgba(11, 26, 53, 0.7), rgba(11, 26, 53, 0.7)),
                url('../../../Styles/signup2.jpg') no-repeat center center fixed;
            background-size: cover;
            background-color: #0b1a35;
            color: #c9b78b;
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .quiz-container {
            background: rgba(39, 51, 83, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 450px;
            border: 1px solid rgba(201, 183, 139, 0.3);
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .quiz-container h2 {
            color: #ffcc00;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            text-shadow: 0 0 10px rgba(255, 204, 0, 0.3);
        }

        .quiz-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .quiz-form input {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 8px;
            background: rgba(11, 26, 53, 0.7);
            color: #f0e6d2;
            font-size: 1rem;
            transition: all 0.3s ease;
            border: 1px solid rgba(201, 183, 139, 0.1);
        }

        .quiz-form input:focus {
            outline: none;
            border-color: #24aade;
            box-shadow: 0 0 10px rgba(36, 170, 222, 0.5);
            background: rgba(11, 26, 53, 0.9);
        }

        .quiz-form input::placeholder {
            color: rgba(201, 183, 139, 0.6);
        }

        .quiz-form button {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #2174ae, #24aade);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .quiz-form button:hover {
            background: linear-gradient(135deg, #1a5a8a, #1d8fc7);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(36, 170, 222, 0.4);
        }
        @media (max-width: 600px) {
            .quiz-container {
                padding: 30px 20px;
            }

            .quiz-container h2 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>

<body>
    <div class="quiz-container">
    <h2>Add New Quiz</h2>
    
        <form class="quiz-form" action="/admin/courses-controllers/AddQuiz/savequiz.php?id=<?php echo $courseid ?>" method="POST">
            <input type="text" name="quiz_name" placeholder="Quiz Name" required>
            <input type="number" name="duration" placeholder="Duration (minutes)" required>
            <input type="number" name="points" placeholder="Points" required>
            <input type="hidden" name="question_count" value="<?= $questionCount ?>">

        <?php for ($i = 1; $i <= $questionCount; $i++): ?>
        <div class="quiz-form">
            <h4>سؤال رقم <?= $i ?></h4>
            <label>نص السؤال:</label>
            <input type="text" name="questions[<?= $i ?>][question]" required value="<?= $_POST['questions'][$i]['question'] ?? '' ?>">

            <label>اختيار 1:</label>
            <input type="text" name="questions[<?= $i ?>][option1]" required value="<?= $_POST['questions'][$i]['option1'] ?? '' ?>">

            <label>اختيار 2:</label>
            <input type="text" name="questions[<?= $i ?>][option2]" required value="<?= $_POST['questions'][$i]['option2'] ?? '' ?>">

            <label>اختيار 3:</label>
            <input type="text" name="questions[<?= $i ?>][option3]" required value="<?= $_POST['questions'][$i]['option3'] ?? '' ?>">

            <label>اختيار 4:</label>
            <input type="text" name="questions[<?= $i ?>][option4]" required value="<?= $_POST['questions'][$i]['option4'] ?? '' ?>">

            <label>الإجابة الصحيحة (رقم من 1 إلى 4):</label>
            <input type="number" name="questions[<?= $i ?>][correct]" min="1" max="4" required value="<?= $_POST['questions'][$i]['correct'] ?? '' ?>">
        </div>
        <?php endfor; ?>
        <button type="submit" name="add_question">Add Question</button>
        <button type="submit" name="save_quiz">Save</button>
        </form>
    </div>
</body>

</html>