<!-- סקריפט להתחברות למסד הנתונים -->
<!-- לצורך שמירת החיבור מהצורה Reauire_once(config.php) -->

<?php
$host = '';     // כתובת שרת MySQL
$username = '';      // שם משתמש של MySQL
$password = '';          // סיסמה של MySQL (בדרך כלל ריקה ב-XAMPP)
$database = ''; // שם בסיס הנתונים הספציפי עליו נעבוד

// יצירת חיבור
$conn = new mysqli($host, $username, $password, $database);

// בדיקת החיבור
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
