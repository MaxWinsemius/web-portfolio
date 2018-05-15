var colors = ["red", "green", "yellow", "white", "black"];
var membres = ["left hand", "right hand", "right foot", "left foot"];
var his = [];


//0 = left hand, 1 = right hand, 2 = right feet, 3 = left feet 
function generateMembre(prevMembre)
{
	var r = 0;
	while ((r = Math.floor(Math.random()*4)) == prevMembre) {}
	return r;
}

//0 = red, 1 = green, 2 = yellow, 3 = white, 4 = black
function generateColor()
{
	return Math.floor(Math.random()*5);
}

function twist(membre)
{
	this.membre = membre;
	this.color = -1;

	//set new color
	for (var i = his.length - 1; i >= 0; i--) {
		if(his[i].membre == this.membre) {
			while ((this.color = generateColor()) == his[i].color){};
			i = -1; //exit loop.
		}
	}

	if(this.color == -1) {
		this.color = generateColor();
	}
}

function setShuffler()
{
	var c = his[his.length - 1];

	//not gonna do this the fancy way today :D
	$(".outer-shuffler")
		.removeClass("red")
		.removeClass("green")
		.removeClass("yellow")
		.removeClass("white")
		.removeClass("black")

		.addClass(colors[c.color]);

	$(".shuffler-text").html("Place your " + membres[c.membre] + " on " + colors[c.color]);
}

$(document).ready(function() {
	his.push(new twist(Math.floor(Math.random()*4)));

	setShuffler();
	$(".outer-shuffler").on("click", function() {
		//generate new twist
		his.push(new twist(generateMembre(his[his.length - 1].membre)));
		setShuffler();
	});
});