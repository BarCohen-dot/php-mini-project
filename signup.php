<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- סגנונות מותאמים אישית -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1 class="bg-primary text-white text-center py-4">Registration Form</h1>
    </header>
    <div class="container mt-5" style="max-width: 400px;">
        <form action="signup.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">שם משתמש</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">כתובת דוא"ל</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">סיסמה</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="confirm-password" class="form-label">אימות סיסמה</label>
                <input type="password" class="form-control" id="confirm-password" name="confirm_password" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">הרשם</button>
            </div>
        </form>

        <?php
        include 'config.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // איסוף נתוני הטופס
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // בדיקה האם המשתמש כבר קיים במסד הנתונים
            $check_user_sql = "SELECT * FROM users
                               WHERE username='$username' OR email='$email'";
            $check_result = $conn->query($check_user_sql);

            if ($check_result->num_rows > 0) {
                // אם המשתמש כבר קיים, הצגת הודעת שגיאה
                echo '<div class="alert alert-danger mt-3" role="alert">משתמש עם שם משתמש או כתובת דוא"ל זו כבר קיים במערכת. בבקשה בחר/י שם משתמש וכתובת דוא"ל אחרים.</div>';
            } else {
                // אם המשתמש לא קיים, הוספתו למסד הנתונים
                $insert_sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

                if ($conn->query($insert_sql) === TRUE) {
                    echo '<div class="alert alert-success mt-3" role="alert">!ההרשמה בוצעה בהצלחה<br>...מעבר לדף ההתחברות בעוד 3 שניות</div>';

                    echo '<script>
                        setTimeout(function() {
                            window.location.href = "index.php";
                        }, 3000); // 3 שניות
                    </script>'; // מעבר לדף ההתחברות
                    exit();
                } else {
                    echo '<div class="alert alert-danger mt-3" role="alert">שגיאה בהוספת המשתמש למסד הנתונים: ' . $conn->error . '</div>';
                }
            }
            // סגירת חיבור לבסיס הנתונים
            $conn->close();
        }
        ?>


    </div>
    <footer class="bg-primary text-white text-center py-3">
        <p>&copy; 2024 - כל הזכויות שמורות</p>
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- סקריפט מותאם אישית -->
    <script src="index.js"></script>
</body>

</html>