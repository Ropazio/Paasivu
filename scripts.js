// Print next seven weekdays starting from today.
const weekdays = ["Sunnuntai", "Maanantai", "Tiistai", "Keskiviikko", "Torstai", "Perjantai", "Lauantai"];
var date = new Date ();
var weekday = [];

for (let i = 0; i < 7; i++) {
	weekday.push(weekdays[date.getDay()]);
	date.setDate(date.getDate() + 1);
}

if (!weekday.length) {
	let day = document.getElementById('weekday_error');
	day.innerHTML = "Virhe viikonpäivien latauksessa."
}
else {
	let day1 = document.getElementById('weekday1');
	let day2 = document.getElementById('weekday2');
	let day3 = document.getElementById('weekday3');
	let day4 = document.getElementById('weekday4');
	let day5 = document.getElementById('weekday5');
	let day6 = document.getElementById('weekday6');
	let day7 = document.getElementById('weekday7');
	day1.innerHTML = (weekday[0] + " (Tämä päivä)");
	day2.innerHTML = (weekday[1] + " (Huominen)");
	day3.innerHTML = weekday[2];
	day4.innerHTML = weekday[3];
	day5.innerHTML = weekday[4];
	day6.innerHTML = weekday[5];
	day7.innerHTML = weekday[6];
}
