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

///////////////////////////////////////////

function activate_mobile_navi() {
  var navi = document.getElementById("navi_headlines");
  if (navi.className === "headline_container") {
    navi.className += " responsive";
  } else {
    navi.className = "headline_container";
  }
}

function close_image() {
	var enlaged_image_view = document.getElementById("enlarged_image_view");
	enlarged_image_view.style.display = "none";
}

function enlarge_image(image_src) {
	var bg = document.getElementById("enlarged_image_view");
	bg.style.display = "block";
	let img = document.getElementById("enlarged_image");
	img.src = image_src;
}

///////////////////////////////////////////

var images = 1;

function add_project_image() {

	var html =	'<tr>' + 
								'<!-- Input fields for image data -->' +
								'<th><input type="text" id="image_src" name="image_src[]" required></th>' +
								'<th><input type="text" id="image_name" name="image_name[]" required></th>' +
								'<th><input type="hidden" name="wide_image[]" value="0"></th>' +
								'<th><input type="checkbox" id="wide_image" name="wide_image[]" value="1"></th>' +
								'<!---->' +
								'<!-- Remove images button -->' +
								'<th><input type="button" class="button" onclick="remove_project_image.call(this)" id="remove_image_button" name="remove_image_button" value="Poista"></th>' +
								'<!---->' +
							'</tr>';

  var max_images = 5;

  var table = document.getElementById("image_data_form");
 	if (images <= max_images) {
 		table.innerHTML += html;
 		images++;
 	}
}

var remove_project_image = function () {
	this.parentNode.parentNode.remove();
	images--;
}
