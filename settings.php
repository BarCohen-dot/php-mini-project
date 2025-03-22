<?php

include 'config.php';

session_start(); // #2 המשך סשן לצורך עדכון שמו החדש

// login.php בדיקה אם המשתמש לא מחובר, מעביר לדף
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// session - משיג את שם המשתמש הנוכחי מה
$current_username = htmlspecialchars($_SESSION['username']);

// עיבוד השליחה של הטופס
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // איסוף נתוני הטופס
    $new_username = $_POST['new_username'];

    // בדיקה האם השם משתמש החדש כבר קיים במסד הנתונים
    $check_username_sql = "SELECT * FROM users WHERE username='$new_username'";
    $check_result = $conn->query($check_username_sql);

    if ($check_result->num_rows > 0) { // אם קיימת תוצאה
        echo '<div class="alert alert-danger mt-3" role="alert">שם המשתמש החדש כבר קיים. אנא בחר שם אחר.</div>';
    } else {
        // לעדכון השם משתמש SQL הכנת הפקודת ה
        $update_username_sql = "UPDATE users SET username='$new_username' WHERE username='$current_username'";

        // ביצוע הפקודה
        if ($conn->query($update_username_sql) === TRUE) { // ביצוע תקינות השאילתא
            // session עדכון משתנה ה
            $_SESSION['username'] = $new_username;
            echo '<div class="alert alert-success mt-3" role="alert">!שם המשתמש עודכן בהצלחה<br>...מעבר לדף ההתחברות בעוד 3 שניות</div>';

            echo '<script>
                setTimeout(function() {
                    window.location.href = "index.php";
                }, 3000); // 3 שניות
            </script>'; // מעבר לדף ההתחברות 
            // מאפשרת לך לבצע קוד מסוים לאחר זמן מוגדר setTimeout הפונקציה
            exit();
        } else {
            // הצגת הודעת שגיאה אם נכשל העדכון
            echo '<div class="alert alert-danger mt-3" role="alert">Error updating username: ' . $conn->error . '</div>';
        }
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
    <title>Update Username</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* עיצוב לתיבת השם הנוכחית - לצורך מניעת בלבול המשתמש */
        #current-username {
            background-color: #e9ecef;
            color: #495057;
        }
    </style>
</head>

<body>
    <header class="bg-primary text-white text-center py-4">
        <h1 class="display-4">Update Username</h1>
    </header>
    <div class="container mt-5" style="max-width: 400px;">
        <form action="settings.php" method="POST">
            <div class="mb-3">
                <label for="current-username" class="form-label">Current Username</label>
                <input type="text" class="form-control" id="current-username" name="current_username" value="<?php echo $current_username; ?>" readonly> <!-- השדה יהיה במצב קריאה בלבד -->
            </div>
            <div class="mb-3">
                <label for="new-username" class="form-label">New Username</label>
                <input type="text" class="form-control" id="new-username" name="new_username" required> <!-- ציון שדה קלט בטופס שהוא חובה למילוי -->
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update Username</button> <!-- בעת הלחיצה פרטי הבלוק יגיעו אל צד השרת -->
            </div>
        </form>
    </div>
    <br>
    <footer class="bg-primary text-white text-center py-3">
        <p>&copy; 2024 - All rights reserved</p>
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>