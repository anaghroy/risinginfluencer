//check for Login "Username and password cannot be empty condition"
function validateLogin() {
    var username = document.getElementById("login-username").value;
    var password = document.getElementById("login-password").value;

    if (username.trim() === "" || password.trim() === "") {
        alert("Username and password cannot be empty.");
        return false;
    }
    
    return true;
}

//check for Registration: "Password strength condition"
function validateRegistration() {
    var username = document.getElementById("reg-username").value;
    var email = document.getElementById("reg-email").value;
    var password = document.getElementById("reg-password").value;
    var passwordPattern = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/;

    if (username.trim() === "" || email.trim() === "" || password.trim() === "") {
        alert("Username, email, and password cannot be empty.");
        return false;
    }

    if (!passwordPattern.test(password)) {
        alert("Password should be at least 8 characters long and contain at least one digit and one special character.");
        return false;
    }

    return true;
}