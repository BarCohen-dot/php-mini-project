var users = [
    {
        username: "admin",
        email: "admin",
        password: "admin"
    },
    {
        username: "admin2",
        email: "admin2",
        password: "admin2"
    }];

// סקריפט לעמוד ההתחברות
var loginForm = document.getElementById("login-btn");
if (loginForm) {
    loginForm.addEventListener("click", function () {

        // משיג את ערכי הקלט
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var user = users.find(function (user) {
            return user.email === email && user.password === password;
        });

        if (user) {
            localStorage.setItem("username", user.username);
            // מעביר את המשתמש לדף home.html
            window.location.href = "home.html";
        } else {
            alert("כתובת דואר או סיסמה לא תקפים. יש לנסות שנית.");
        }
    });
}

// סקריפט לעמוד הבית
var homeHeading = document.getElementById("home-heading");
if (homeHeading) {
    var username = localStorage.getItem("username");
    if (username) {
        homeHeading.innerText += ', ' + username;
    } else {
        homeHeading.innerText;
    }

}

// קוד לכפתורי הניווט לדפים השונים
var dramaBtn = document.getElementById("drama-btn");
if (dramaBtn) {
    dramaBtn.addEventListener("click", function () {
        window.location.href = "drama.php";
    });
}
var actionBtn = document.getElementById("action-btn");
if (actionBtn) {
    actionBtn.addEventListener("click", function () {
        window.location.href = "action.php";
    });
}
var comedyBtn = document.getElementById("comedy-btn");
if (comedyBtn) {
    comedyBtn.addEventListener("click", function () {
        window.location.href = "comedy.php";
    });
}

// קוד לטופס השחזור
var form = document.querySelector("#restore-form");
if (form) {
    form.addEventListener("submit", function (event) {
        var password = document.getElementById("restore-pass").value;
        var confirmPassword = document.getElementById("restore-confirm-pass").value;

        if (password !== confirmPassword) {
            alert("הסיסמאות אינן תואמות. יש לנסות שנית.");
        } else {
            alert("הסיסמה תואמת!.");
        }
    });
}
