var unamecheck = false;
var emailcheck = false;

$(document).ready(function(){
    let anchor = window.location.hash;
    anchor = anchor.slice(1,99);
    activateTab(anchor);
})

function activateTab(tab){
    $('.nav-tabs a[href="#' + tab + '"]').tab('show');
}

function log(param) {
    console.log(param);
}

function validateRegistration() {
    // let first_name = document.getElementById("first_name").value;
    // let surname = document.getElementById("surname").value;
    let email = document.getElementById("email").value;
    let username = document.getElementById("username").value;
    let password = document.getElementById("pass1").value;
    let passwdcheck = document.getElementById("pass2").value;
    usernameUsedCheck(username);
    emailUsedCheck(email);
    if (password !== passwdcheck || !passwordLength(password) || !unamecheck || !emailcheck) {
        event.preventDefault();
    }
}

function usernameUsedCheck(username) {
    if (username.length === 0) {
        document.getElementById("usernameMessage").innerHTML="";
        unamecheck = false;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "?c=auth&a=userExists&username="+username, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                if (this.response === "true") {
                    document.getElementById("usernameMessage").innerHTML = "Username is already used.";
                    document.getElementById("usernameMessage").classList = "warningMessage text-center";
                    unamecheck = false;
                } else if (this.response === "false") {
                    document.getElementById("usernameMessage").innerHTML = "You can use this username.";
                    document.getElementById("usernameMessage").classList = "okMessage text-center";
                    unamecheck = true;
                }
            }
        }
    }
}

function emailUsedCheck(email) {
    if (email.length === 0) {
        document.getElementById("emailMessage").innerHTML="";
        emailcheck = true;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "?c=auth&a=emailExists&email="+email, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                if (this.response === "true") {
                    document.getElementById("emailMessage").innerHTML = "There is already account with this email.";
                    document.getElementById("emailMessage").classList = "warningMessage text-center";
                    emailcheck = false;
                } else if (this.response === "false") {
                    document.getElementById("emailMessage").innerHTML = "";
                    document.getElementById("emailMessage").classList = "okMessage text-center";
                    emailcheck = true;
                }
            }
        }
    }
}

function passwordLength(pass) {
    if (pass.length < 4) {
        document.getElementById("passwordLengthMessage").innerHTML = "Password is too short.";
        return false;
    } else {
        document.getElementById("passwordLengthMessage").innerHTML = "";
        return true;
    }
}

function comparePasswords(pass) {
    if (pass.length === 0) {
        document.getElementById("passwordRepeatMessage").innerHTML = "";
        return false;
    } else if (pass !== document.getElementById("pass1").value) {
        document.getElementById("passwordRepeatMessage").innerHTML = "Passwords are not the same!";
        document.getElementById("passwordRepeatMessage").classList = "warningMessage text-center";
        return false;
    } else {
        document.getElementById("passwordRepeatMessage").innerHTML = "Passwords are matching.";
        document.getElementById("passwordRepeatMessage").classList = "okMessage text-center";
        return true;
    }
}