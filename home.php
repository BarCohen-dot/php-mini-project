<?php

include 'config.php';

session_start(); // #3 המשך סשן לצורך בדיקת חיבור המשתמש

// index.php בדוק אם המשתמש אינו מחובר, הפנה אותו ל 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit(); // סיום הקוד
}
// קבל את שם המשתמש מהסשן
$username = htmlspecialchars($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Studios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header class="bg-primary text-white text-center py-4">
        <u>
            <h1 id="home-heading" class="display-4">WELCOME To Success Studios <i><?php echo $username; ?></i> </h1>
        </u><!-- הכותרת תופיע עם שם המשתמש המחובר -->

        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet nisi nec justo maximus lacinia ut eget libero.</p>

        <a href="settings.php" style="color: aliceblue;">Update Username: <i><?php echo $username; ?></i></a>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="images/1.jpg" class="card-img-top" alt="Drama Series">
                    <div class="card-body">
                        <h3 class="card-title">Drama Series</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button id="drama-btn" class="btn btn-primary">Show Details</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="images/2.jpg" class="card-img-top" alt="Action Series">
                    <div class="card-body">
                        <h3 class="card-title">Action Series</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button id="action-btn" class="btn btn-primary">Show Details</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="images/3.jpg" class="card-img-top" alt="Comedy Series">
                    <div class="card-body">
                        <h3 class="card-title">Comedy Series</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button id="comedy-btn" class="btn btn-primary">Show Details</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-primary text-white text-center py-3">
        <p>&copy; 2024 - כל הזכויות שמורות</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="index.js"></script>

    <!-- JavaScript -ל Cookie -->
    <script>
        // Cookie פונקציה להגדרת קובץ 
        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000)); // Cookie זמן שהות הגדרת ה
                expires = "; expires=" + date.toUTCString(); // utc המשתנה נשמר בצורת מחרוזת בפורמט תאריך לפי
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/"; // אנו בעצם מוסיפים עוגיה חדשה או מעדכנים עוגיה קיימת במערכת העוגיות של הדפדפן
        }

        // Cookie נחזיר את כל כותרות הכרטיסיות ונאחסן בקובץ 
        document.addEventListener("DOMContentLoaded", function() {
            var cardTitles = document.querySelectorAll(".card-title");
            var seriesNames = [];
            cardTitles.forEach(function(title) {
                seriesNames.push(title.innerText); // הוספת כול הכותרות למערך הכותרות הכללי
            });
            setCookie("seriesNames", JSON.stringify(seriesNames), 7); // שמור למשך 7 ימים
        });
    </script>
</body>

</html>