var boxTimer;
var clickedTime;
var createdTime;
var reactionTime;
var avgTime;
var totalTime;
var rounds;

var colors = ["red", "blue", "green", "purple", "yellow", "brown", "orange"];
var colorPicker = 0;

var imagePicker;

var _top, _right, _bottom, _left;

function makeBox() {
	// set timeout time
	boxTimer = Math.random();
	boxTimer = 1000 + (boxTimer * 2000);   // min 1 sec

	// choose color
	/*
	colorPicker = Math.random();
	colorPicker = colorPicker * (colors.length + 1);
	colorPicker = Math.floor(colorPicker);
	// set div background color
	document.getElementById("box").style.backgroundColor = colors[colorPicker];
	*/

	// choose shape
	/*
	if (Math.random() < 0.5) {
		document.getElementById("box").style.borderRadius = "0px";
	} else {
		document.getElementById("box").style.borderRadius = "100px";
	}
	*/

	// choose background-image
	imagePicker = Math.random();
	if (imagePicker <= 0.2) {
		document.getElementById("box").style.backgroundImage = "url('images/reactiongameImages/img01.jpg')";
	} else if (imagePicker > 0.2 && imagePicker <= 0.4) {
		document.getElementById("box").style.backgroundImage = "url('images/reactiongameImages/img02.jpg')";
	} else if (imagePicker > 0.4 && imagePicker <= 0.6) {
		document.getElementById("box").style.backgroundImage = "url('images/reactiongameImages/img03.jpg')";
	} else if (imagePicker > 0.6 && imagePicker <= 0.8) {
		document.getElementById("box").style.backgroundImage = "url('images/reactiongameImages/img04.jpg')";
	} else {
		document.getElementById("box").style.backgroundImage = "url('images/reactiongameImages/img05.jpg')";
	}

	// choose position
	_top = Math.floor(Math.random() * 300);
	_right = Math.floor(Math.random() * 300);
	_bottom = Math.floor(Math.random() * 300);
	_left = Math.floor(Math.random() * 300);
	// set div position
	document.getElementById("box").style.top = _top + "px";
	document.getElementById("box").style.right = _right + "px";
	document.getElementById("box").style.bottom = _bottom + "px";
	document.getElementById("box").style.left = _left + "px";

	// run timeout function and display shape
	setTimeout(function() {
		// show div
		document.getElementById("box").style.display = "block";

		createdTime = Date.now();
	}, boxTimer);
}

function startGame() {
	reactionTime = 0;
	avgTime = 0;
	totalTime = 0;
	rounds = 0;

	document.getElementById("time").innerHTML = reactionTime.toFixed(3) + "s";
	document.getElementById("average").innerHTML = avgTime.toFixed(3) + "s";

	makeBox();
}

// display initial shape
//makeBox();

// on click actions
// start button
document.getElementById("startButton").onclick = function() {
	startGame();
}

// submit button
document.getElementById("submitButton").onclick = function() {
	alert("Sorry, this doesn't do anything yet...");
}

// click div
document.getElementById("box").onclick = function() {
	clickedTime = Date.now();
	reactionTime = (clickedTime - createdTime) / 1000;  // ms to s

	rounds++;
	totalTime += reactionTime;
	avgTime = totalTime / rounds;

	this.style.display = "none";

	document.getElementById("time").innerHTML = reactionTime.toFixed(3) + "s";
	document.getElementById("average").innerHTML = avgTime.toFixed(3) + "s";

	makeBox();
}