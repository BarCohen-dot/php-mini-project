<?php

include 'config.php';

session_start(); // #1 התחל סשן, לצורך שמירת פרטי המשתמש
// המשתמש מתחבר לאתר ובעקבות כך נרצה לספק לו את הפונקציות השונות הקיימות באתר, לצורך זה נצטרך לשמור את פרטיו

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // איסוף נתוני הטופס
    $email = $_POST['email'];
    $password = $_POST['password'];

    // לשאילתת בחירה לקבלת משתמש ממסד הנתונים SQL הכנת פקודת ה
    $sql = "SELECT * FROM users 
            WHERE email='$email' AND password='$password'";

    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // אם נמצא משתמש תואם - נחזיר את נתוני המשתמש
        $row = $result->fetch_assoc(); // כקבוצת מערכים אסוציאטיבית SQL מביאה את השורה הבאה מתוצאת שאילתת PHP ב fetch_assoc() פונקציה

        // שמירת נתוני המשתמש במשתני סשן
        $_SESSION['username'] = $row['username']; // שמירה מתוך השורה שמצאנו
        $_SESSION['email'] = $row['email'];

        // לצורך התחברות המשתמש והמשך הסשן, home.php הפניה לדף
        echo '<div class="alert alert-success mt-3" role="alert">!ההתחברות בוצעה בהצלחה<br>...מעבר לדף הבית בעוד 3 שניות</div>';
        echo '<script>
            setTimeout(function() {
                window.location.href = "home.php";
            }, 3000); // 3 שניות
        </script>'; // מעבר לדף ההתחברות 
        // מאפשרת לך לבצע קוד מסוים לאחר זמן מוגדר setTimeout הפונקציה
        // header("Location: home.php"); ניתן להשתמש גם בפונקציה 
        exit();
    } else {
        // הצגת הודעת שגיאה אם ההתחברות נכשלה
        echo '<div class="alert alert-danger mt-3" role="alert">אימייל או סיסמה שגויים. בבקשה נסה שוב.</div>';
    }

    // סגירת חיבור למסד הנתונים עליו עבדנו
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- סגנונות מותאמים -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1 class="bg-primary text-white text-center py-4">Login</h1>
    </header>
    <div class="container mt-5" style="max-width: 400px;">
        <div id="custom-container">
            <form action="index.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Login</button> <!-- בעת הלחיצה פרטי הבלוק יגיעו אל צד השרת -->
                </div>
                <div class="login-links">
                    <a href="signup.php">New? Register here</a>
                    <a href="restore.html">Forgot Password?</a>
                </div>
            </form>

            <?php
            // הצגת הודעת שגיאה אם נכשלה ההתחברות
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                echo '<div class="alert alert-danger mt-3" role="alert">הדוא"ל או הסיסמה אינ ם נכונים. נסה שוב.</div>';
            }
            ?>

        </div>
    </div>
    <footer class="bg-primary text-white text-center py-3">
        <br>
        <p>&copy; 2024 - All rights reserved</p>
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- סקריפט מותאם -->
    <script src="index.js"></script>
</body>

</html>