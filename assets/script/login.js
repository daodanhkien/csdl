function login()
{
    var login = document.getElementById("digLogin");
    login.open = !login.open;
}
function switchForm() {
    var submit = document.getElementById("submitButton");
    if (submit.value == "SignUp") {
        submit.value = "Login";
        let le = document.getElementsByClassName("signup");
        for (let i = 0; i < le.length; ++i)
        {
            le[i].hidden = true;
            let tem = le[i].getElementsByTagName("input")[0];
            tem.required = false;
        }
        document.getElementById("acc").placeholder = "Phone / Name";
        document.getElementById("form").action = "login.php";
    } else {
        submit.value = "SignUp";
        let le = document.getElementsByClassName("signup");
        for (let i = 0; i < le.length; ++i)
        {
            let tem = le[i].getElementsByTagName("input")[0];
            if (tem.name != "email") tem.required = true;
            le[i].hidden = false;
        }
        document.getElementById("acc").placeholder = "Phone";
        document.getElementById("form").action = "signup.php";
    }
    document.getElementById("form").reset();
}
function sendForm() {
    f.reset();
    alert(window.location);
}
document.getElementById("lastLocation").value = document.location;
// function add(l) {
//     var ip = document.createElement('input');
//     ip.type = "text";
//     ip.name = "lastLocation";
//     ip.value = document.location.href;
//     l.appendChild(ip);
// }
