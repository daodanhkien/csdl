function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("list-items");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByClassName("name")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "inline-block";
        } else {
            li[i].style.display = "none";
        }
    }
}
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
function delete_cookie(name) {
    document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}
function buy(num) {
    var ele = document.getElementById("list-items").getElementsByTagName("li")[num];
    var dag = document.getElementById("dialog");
    document.getElementById("imgOrder").style.backgroundImage = ele.getElementsByClassName("img")[0].style.backgroundImage;
    document.getElementById("price").textContent = Number(ele.getElementsByClassName("gia")[0].textContent);
    if (dag.open) {
        document.getElementById("numberOrder").textContent = 0;
        document.getElementById("sumValue").textContent = 0;
    }
    document.getElementById('idOrder').value = ele.getElementsByClassName("id")[0].textContent;
    document.getElementById("maxSize").textContent = Number(ele.getElementsByClassName("maxStock")[0].textContent);
    dag.open = true;
}
function changeNumber(number) {
    var num = document.getElementById("numberOrder");
    num.textContent = Number(num.textContent) + number;
    if (Number(num.textContent) <= 0) num.textContent = 0;
    else if (Number(num.textContent) >= Number(document.getElementById("maxSize").textContent)) {
        num.textContent = document.getElementById("maxSize").textContent;
    }
    document.getElementById("sumValue").textContent = (Number(num.textContent) * Number(document.getElementById("price").textContent)).toFixed(2);
}
function cance() {
    document.getElementById("dialog").open = false;
    document.getElementById("numberOrder").textContent = 0;
    document.getElementById("sumValue").textContent = 0;
}
function buyIt() {
    if (getCookie('user') != "") {
        document.getElementById('number').value = document.getElementById("numberOrder").textContent;
        if (Number(document.getElementById('number').value) > 0) {
            document.getElementById("orderForm").submit();
        }
    } else {
        document.getElementById("digLogin").open = true;
    }
}
function cart(num, n) {
    var ele = document.getElementById("list-items").getElementsByClassName('cart')[n];
    if (ele.textContent == "Cart") {
        document.cookie = num + "=1;";
        ele.textContent = "Uncart";
    } else {
        delete_cookie(num);
        // document.cookie = num + "=0;";
        ele.textContent = "Cart";
    }
}
