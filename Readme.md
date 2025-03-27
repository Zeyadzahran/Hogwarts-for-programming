# 🏰 Hogwarts Magic School Project

## ✨ Overview
Welcome to Hogwarts Magic School! This project is a magical platform where users can experience the world of wizardry, enroll in courses, take quizzes, and engage in exciting activities.

## 🧐 Features
### 🧙‍♂️ Admin Panel
Admins have the following powers:
- View all users.
- Promote professors to admin.
- Delete any user.

#### Grand Admin can:
- View all available courses.
- See which professors are teaching each course.

#### Professor Admin can:
- View only the courses they teach.
- Add quizzes to their courses.

### 🎩 User Features
Users have access to:
- **Profile Page** 📜
  - View their name, email, house, and wand.
- **Course Enrollment** 🏭
  - Enroll in any available course.
  - Take quizzes and receive grades.
- **Shop** 🛒
  - Purchase magical items.
- **Inventory** 🎒
  - Items appear in the Inventory Page.
- **🏆 Houses Leaderboard**
  - View the ranking of houses based on total points.
- **📊 House Points System**
  - Each house's total points are calculated from the sum of all students' grades within that house.
  - The leaderboard appears on both Admin and User dashboards.

## 📂 Project Directory Structure
```
📚 HOGWARTS-FOR-PROGRAMMING/
│── 💻 admin/
│   ├── addquiz.php
│   ├── adminClass.php
│   ├── adminContr.php
│   ├── dashboard.php
│   ├── deleteContr.php
│   ├── leaderBoard.php
│   ├── manageCourses.php
│   ├── manageUsers.php
│   ├── savequiz.php
│   ├── navPar.php
│
│── 📚 classes/
│   ├── dbh.classes.php
│   ├── login-contr.classes.php
│   ├── login.classes.php
│   ├── signup-contr.classes.php
│   ├── signup.classes.php
│
│── 🗄️ database/
│   ├── erd.jpg
│   ├── ERD.pdf
│   ├── query.sql
│   ├── Schema.sql
│
│── 📁 includes/
│   ├── login.inc.php
│   ├── signup.inc.php
│
│── 🏠 src/
│   ├── index.php
│   ├── login.php
│   ├── logout.php
│
│── 🌟 Styles/
│   ├── flag.jpg
│   ├── signup2.jpg
│   ├── style.css
│
│── 👨‍🎓 user/
│   ├── ❓quiz/
│   │   ├── done.css
│   │   ├── done.php
│   │   ├── flag.jpg
│   │   ├── quiz.php
│   │   ├── quize.css
│   │   ├── structureQuiz.php
│   ├──  🛍️ shop/
│   │   ├── img/
│   │   ├── BuyItem.php
│   │   ├── shop.php
│   │   ├── shopCntr.php
│   ├── assignCourse.php
│   ├── courses.php
│   ├── dashboard.php
│   ├── inventory.php
│   ├── LeaderBoard.php
│   ├── ManageCourses.php
│   ├── profile.php
│   ├── navPar.php
│   ├── userClass.php
│
│── index.php
│── Readme.md
```

## 📌 Prerequisites
Before running the project, ensure you have the following installed:

1. **XAMPP** 🖥️  
   - Download and install XAMPP from [Apache Friends](https://www.apachefriends.org/).
   - Start Apache and MySQL from the XAMPP Control Panel.

2. **SQL Server (MySQL)** 📂  
   - Ensure you have MySQL installed to manage the database.

## 🚀 Setting Up the Project
### 1. Clone the Repository 🎩
```
git clone https://github.com/Zeyadzahran/Hogwarts-for-programming.git
cd Hogwarts-for-programming
```

### 2. Import the Database 📚
1. Open **phpMyAdmin** (`http://localhost/phpmyadmin`).
2. Create a **new database**.
3. Import the provided SQL files in the following order:
   - `Schema.sql` (to set up the database structure)
   - `query.sql` (to populate the database with initial data)

### 3. Run the Project 💥
1. Place the project folder inside `htdocs`.
2. Open your browser and go to:
   - `http://localhost/Hogwarts-for-programming/`.

## 🎭 Magic Awaits!
Embark on your wizarding journey and let the spells begin! 🧙‍♂️🫶🌟







