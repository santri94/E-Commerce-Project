var start=0;
function set_time() {
	// body...
	setInterval(image_show, 2000); //time interval for 2 secs
}

function image_show() {
	// body...
	var image_data = ["Images/bg1.jpg","Images/bg2.jpg","Images/bg3.jpg",
						"Images/bg4.jpg","Images/bg5.jpg"];


document.getElementById('data').src=""+image_data[start];
start++;
if (start == 5) {
	start = start % 5;
}



}