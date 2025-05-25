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

    var html =  `<tr>
                    <!-- Input fields for image data -->
                    <td data-label="Kuvatiedosto (.jpg/.png/.jpeg):" scope="row"><input type="file" class="image_src" name="images[${images}]" required></td>
                    <td data-label="Kuvan nimi:"><input type="text" class="image_name" name="images[${images}][name]" required></td>
                    <td data-label="Laajakuva:"><input type="checkbox" class="is_wide" name="images[${images}][is_wide]" value="${images+1}"></td>
                    <!---->
                    <!-- Remove images button -->
                    <td><input type="button" class="button project_button" onclick="remove_project_image.call(this)" id="remove_image_button" name="remove_image_button" value="Poista"></td>
                    <!---->
                </tr>
                `;

    var max_images = 3;

    var table = document.getElementById("image_data_form");
    if (images <= max_images) {
        table.insertAdjacentHTML("beforeend",html);
        images++;
    }
}

var remove_project_image = function () {
    this.parentNode.parentNode.remove();
    images--;
}

//////////////////////////////////////////////////////////

// A black cutie cat is running across the screen when certain button in the screen is pressed.//

var cat = null;     // cat gif.
var animate;        // cat 
var catX = 0;       // cat position in x axis.
var catY = 0;       // cat position in y axis.
var sign = 1;       // sign to change cat y direction.

function init() {
    let elems = document.getElementsByClassName("cat");
    if (elems.length == 0)
        return;
    cat = elems[0];

    //set initial values
    cat.style.position = "fixed";
    cat.style.left = "0px";
    cat.style.bottom = "0px";
}

function move() {
    if (cat == null)
        return;

    cat.style.display = "block";            // make cat visible on screen.
    if (catX < window.innerWidth && catY < window.innerHeight) {
        catX += 3;
        catY += sign * 8 * Math.random();
        if (catX % 60 == 0) {
            sign = -1;
            cat.style.transform = "rotate(10deg)";
        }
        if (catX % 90 == 0) {
            sign = 1;
            cat.style.transform = "rotate(-10deg)";

        }
        cat.style.left = catX + "px";
        cat.style.bottom = ((window.innerHeight - 200) / 2) + catY + "px";
        animate = setTimeout(move, 8);      // call move in 15msec.
    }
    else {
        clearTimeout(animate);              // set cat back to starting position and make it invisible. 
        catX = 0;
        catY = 0;
        cat.style.left = catX + "px";
        cat.style.bottom = catY + "px";
        cat.style.display = "none";
    }
}

window.onload = init;
