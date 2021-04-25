function nav() {
    let user = document.getElementById("user");
    user.hidden = !user.hidden;
}
function toIt(ele) {
	var name = "";
	var ca = document.cookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		name += c;
		if (i != ca.length) {
			name += '&';
		}
	}
	ele.href += "?" + name;
}
