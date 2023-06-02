const date = new Date ();

function load_weekdays() {
	// Print next seven weekdays starting from today.
	const weekdays = ["Sunnuntai", "Maanantai", "Tiistai", "Keskiviikko", "Torstai", "Perjantai", "Lauantai"];
	var weekday = [];
	
	for (let i = 0; i < 7; i++) {
		weekday.push(weekdays[date.getDay()]);
		date.setDate(date.getDate() + 1);
	}
	
	if (!weekday.length) {
		let day = document.getElementById('weekday_error');
		day.innerHTML = "Virhe viikonpäivien ja ajatuksenvirran latauksessa.";
	}
	else {
		let day0 = document.getElementById('sticky_note');
		let day1 = document.getElementById('weekday1');
		let day2 = document.getElementById('weekday2');
		let day3 = document.getElementById('weekday3');
		let day4 = document.getElementById('weekday4');
		let day5 = document.getElementById('weekday5');
		let day6 = document.getElementById('weekday6');
		let day7 = document.getElementById('weekday7');
	
		day0.innerHTML = " ";
		day1.innerHTML = (weekday[0] + " (Tämä päivä)");
		day2.innerHTML = (weekday[1] + " (Huominen)");
		day3.innerHTML = weekday[2];
		day4.innerHTML = weekday[3];
		day5.innerHTML = weekday[4];
		day6.innerHTML = weekday[5];
		day7.innerHTML = weekday[6];
	}
}


function summer_theme() {
	// Summer theme; text colour and header background change.
	var summer_months = [4, 5, 6, 7];
	var root = document.querySelector(':root');
	
	if (summer_months.includes(date.getMonth())) {
		let header = document.querySelector('.header');
	
		header.style.background = "url(img/summer.jpg)";
		header.style.backgroundAttachment = "fixed";
		header.style.backgroundSize = "100% auto";
	
		root.style.setProperty('--orange_colour', '#03ac13');
		root.style.setProperty('--dark_orange_colour', '#028a0f');
	}
}