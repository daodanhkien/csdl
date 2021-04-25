function changeNumber(number, n) {
    var num = document.getElementsByClassName("numberOrder")[n];
    var nu = Number(document.getElementById('butAllCart').textContent) - Number(num.textContent) * Number(document.getElementsByClassName("gia")[n].textContent);
    num.textContent = Number(num.textContent) + number;
    if (Number(num.textContent) <= 0) num.textContent = 0;
    else if (Number(num.textContent) >= Number(document.getElementsByClassName("maxStock")[n].textContent)) {
        num.textContent = document.getElementsByClassName("maxStock")[n].textContent;
    }
    nu += Number(num.textContent) * Number(document.getElementsByClassName("gia")[n].textContent);
    document.getElementById('butAllCart').textContent = nu.toFixed(2);
}
function buyCart() {
    var l_id = "";
    var l_nu = "";
    var li = document.getElementById('list-orders').getElementsByTagName('li');
    for (var i = 0; i < li.length; ++i) {
        var nu = Number(li[i].getElementsByClassName('numberOrder')[0].textContent);
        if (nu > 0) {
            l_nu += nu + " ";
            l_id += li[i].getElementsByClassName('id')[0].textContent + " ";
        }
    }
    document.getElementById('formID').value = l_id.substr(0, l_id.length-1);
    document.getElementById('formNum').value = l_nu.substr(0, l_nu.length-1);

    document.getElementById('formCart').submit();
}
function delete_cookie(name) {
    document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}
function xIt(num) {
    document.getElementById('list-orders').getElementsByTagName('li')[num].hidden = true;
    delete_cookie(document.getElementById('list-orders').getElementsByClassName('id')[num].textContent);
    window.location.reload();
}
