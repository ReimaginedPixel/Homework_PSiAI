var time = document.querySelectorAll(".time");
var date = document.querySelectorAll(".date");

function startTime() {
	const today = new Date();
	let h = today.getHours();
	let m = today.getMinutes();
	let s = today.getSeconds();
	let day = today.getDate();
	let month = today.getMonth();
	m = checkTime(m);
	s = checkTime(s);
	day = checkTime(day);
	month = checkTime(month + 1);
	time[0].innerHTML = h;
	time[1].innerHTML = m;
	time[2].innerHTML = s;
	date[0].innerHTML = day;
	date[1].innerHTML = month;
	setTimeout(startTime, 1000);
}

function checkTime(i) {
	if (i < 10) {
		i = "0" + i;
	}
	return i;
}