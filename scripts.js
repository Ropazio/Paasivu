// Function to open and shut collapsibles.//

var coll = document.getElementsByClassName("headlines");
var i;

for (i = 0; i < coll.length; i++) {
	coll[i].addEventListener("click", function() {
		var content = this.nextElementSibling;
		if (content == null)
			return;

		this.classList.toggle("active");
		if (content.style.display === "none") {
			content.style.display = "block";
		}
		else {
			content.style.display = "block";
		}
	});
}