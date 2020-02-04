$(function () {	
	//COLLAPSIBLE

	var coll = document.getElementsByClassName("collapsible");
	var i;
	var l;

	for (i = 0; i < coll.length; i++) {
		coll[i].addEventListener("click", function() {
		this.classList.toggle("active");
		var content = this.nextElementSibling;
		if (content.style.display === "block") {
			content.style.display = "none";
		} else {
			for (l =0 ; l < coll.length; l++){
				var cont = coll[l].nextElementSibling;
				cont.style.display = 'none'
			}
			content.style.display = "block";
		}
		});
	}

});