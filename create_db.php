<!-- בעצם כאן אנו עובדים על מסד הנתונים הכללי (המסד המכיל את כל תתי-המסדים) -->

<?php

include 'config.php';

// יצירת בסיס הנתונים
$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS successDB";
if ($conn->query($sqlCreateDB) === TRUE) { // אם הצלחנו ליצור את מסד הנתונים הספציפי
    echo "בסיס הנתונים successDB נוצר בהצלחה<br>";
} else {
    echo "שגיאה ביצירת בסיס הנתונים: " . $conn->error . "<br>";
}

// successDB בחירת בסיס הנתונים עליו נעבוד 
$conn->select_db("successDB");

// יצירת טבלה למשתמשים
$sqlCreateTable = "CREATE TABLE IF NOT EXISTS users (
                    id INT AUTO_INCREMENT PRIMARY KEY, 
                    username VARCHAR(50) NOT NULL,
                    email VARCHAR(100) NOT NULL,
                    password VARCHAR(255) NOT NULL
                )";
// AUTO_INCREMENT סופר אוטומטית את הערכים של השדה בטבלה

if ($conn->query($sqlCreateTable) === TRUE) { // אם הצלחנו ליצור את הטבלה
    echo "טבלת המשתמשים נוצרה בהצלחה<br>";
} else {
    echo "שגיאה ביצירת הטבלה: " . $conn->error . "<br>";
}

// סגירת החיבור, כלומר כאן אנו סוגרים את החיבור הזמני למסד הנתונים הכללי
$conn->close();
