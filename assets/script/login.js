function login()
{
    var login = document.getElementById("digLogin");
    if (login.open) {
        login.open = false;
    } else {
        login.open = true;
    }
}
function switchForm() {
    if (document.form.submitButton.value == "SignUp") {
        document.form.submitButton.value = "Login";
        var le = document.getElementsByClassName("signup");
        for (let i = 0; i < le.length; ++i)
        {
            le[i].hidden = true;
        }
    } else {
        document.form.submitButton.value = "SignUp";
        var le = document.getElementsByClassName("signup");
        for (let i = 0; i < le.length; ++i)
        {
            le[i].hidden = false;
        }
    }
}
function sendForm() {
    var f = document.getElementById("form");
    f.submit();
    f.reset();
}
