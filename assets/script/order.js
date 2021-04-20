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
function buy(ele) {
    var dag = document.getElementById("dialog")
    document.getElementById("imgOrder").style.backgroundImage = "url(" + ele.getElementsByClassName("hinhMinhHoa")[0].src + ")";
    dag.open = true;
}
function changeNumber(number) {
    var num = document.getElementById("numberOrder");
    num.textContent = Number(num.textContent) +  number;
    if (Number(num.textContent) <= 0) num.textContent = 0;
    var sum = document.getElementsByClassName("ok")[0];
    sum.textContent = Number(num.textContent);
}
function cance() {
    document.getElementById("dialog").open = false;
}
