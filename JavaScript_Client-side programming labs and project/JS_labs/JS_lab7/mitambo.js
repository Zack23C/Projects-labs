var canvas = document.getElementById("tomtom");
var tomtom = canvas.getContext("2d");
wata = canvas.width;
mama = canvas.height;
var dhina = 45;
var hande = 15;
var famba = 5;
var araay = [];
var count = 8;
var bhora = {
	x: wata/2,
	y: mama/2,
	w: 20,
	h:20,
	dx:1,
	dy:-1,
	speed:6,
	nyora: function () {
		tomtom.fillRect ( this.x, this.y, this.w, this.h)
	} ,
	famba : function() {
		this.x += 1 * this.dx;
		this.y += 1 * this.dy;
		this.rova();
	},
	rova: function () {
		if(this.x <= 0 || this.x >= canvas.width - this.w) {
			this.dx *= -1 ;
		}
		if(this.y <=0) {
			this.dy *= -1 ;
		}
	}
};
function play()
{
	var peduru = new Audio();
	peduru.play();
}
function biriki()
{
	var peduru = new Audio();
	peduru.play();
}
function vhura()
{
	var bhoraBottom = bhora.y + bhora.h;
	var musoro = paddle.y + bhora.h +paddle.h;
	tomtom.clearRect(0, 0, wata,mama);
	tomtom.fillStyle="white";
	if(araay.length == 0 )
	{
		tomtom.fillText("You Won! ",wata/2 -50,mama/2);
		return;
	}else if (bhoraBottom > musoro) {
		tomtom.fillText("You Failed! ",wata/2 -50,mama/2);
		return;
	}
}
var score =0;
function scorea()
{
	tomtom.fillStyle="white";
	tomtom.fillText(": "+score,0,20);
	tomtom.fillStyle="blue";
}
canvas.addEventListener("mousemove", function famba(event) {
	mousemouse = event.clientX - this.offsetLeft;
	paddle.famba(mousemouse);
});

function zvapera()
{
	var bhoraBottom = bhora.y + bhora.h;
	var musoro = paddle.y + bhora.h +paddle.h;
	if(araay.length == 0 || bhoraBottom > musoro)
	{
		return  true;
	}
	return false;
}
function tsika() {
	var bhoraBottom = bhora.y + bhora.h;
	var bhoraCenterX = bhora.x + bhora.w/2;
	var musoro = paddle.y;
	var peduru = paddle.x + paddle.w/2;
	var centerDistance = Math.abs(bhoraCenterX - peduru);
	var touchDistance = bhora.w/2 + paddle.w/2;

	if (bhoraBottom >= musoro && centerDistance <= touchDistance) {

		bhora.y = paddle.y - bhora.h;
		bhora.dy *= -1;
		play();
	}
}
function aizve() {
	for(i=0;i<araay.length;i++) {
		var bhoraBottom = bhora.y ;
		var centerDistance = Math.abs(bhoraCenterX - peduru);
		var touchDistance = bhora.w/2 + araay[i].w/2;
		var bhoraCenterX = bhora.x + bhora.w/2;
		var musoro = araay[i].y;
		var peduru = araay[i].x + araay[i].w/2;
		if (bhoraBottom == musoro && centerDistance <= touchDistance) {
			score++;
			bhora.y = araay[i].y ;
			araay.splice(i,1);
			bhora.dy *= -1;
			console.log(araay[i]) ;
			biriki();
			break;
		}
	}
}
var paddle = {
	x:wata/2,
	y:mama - 20,
	w:50,
	h:10,
	nyora: function () {
		tomtom.fillRect( this.x, this.y, this.w, this.h);
	},
	famba: function (mousemouse) {
		this.x = mousemouse - this.w / 2;
	}
}
function isabiriki () {
	for (var i=0; i<count;i++){
		var kwese = {x:10 + (dhina + famba)*i,
			y:900,
			w:0,
			h:0};
		araay.push(kwese);
	}
}
function changu () {
	tomtom.clearRect(0, 0, wata,mama);
	bhora.famba ();
	bhora.nyora();
	paddle.nyora();
	tsika();
	scorea();
	aizve();
	if(zvapera())
	{
		vhura();
		console.log('zvapera!');
		return;
	}
	for(i=0;i<araay.length;i++) {
		tomtom.fillRect (araay[i].x, araay[i].y, araay[i].w, araay[i].h)
	}
	requestAnimationFrame(changu);
}
isabiriki();
requestAnimationFrame (changu);
