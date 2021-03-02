
var canvas = document.getElementById("stage");
	var ctx = canvas.getContext("2d");


// this is a brick code section!!
	var brick = {};
	brick.row = 3;
	brick.width = 60;
	brick.padding = 6;
	brick.column = 9;
	brick.height = 20;
	brick.offsetTop = 5;
	brick.offsetLeft = 5;

var bricks = [];
	for(c=0; c<brick.column; c++) {
	    bricks[c] = [];
	    for(r=0; r<brick.row; r++) {
	        bricks[c][r] = { x: 0, y: 0, status: 1 };
	}
}


	brick.draw = function () {
	    for(c=0; c<brick.column; c++) {
	        for(r=0; r<brick.row; r++) {
	        	if (bricks[c][r].status == 1) {
		            var brickX = (c*(brick.width+brick.padding))+brick.offsetLeft;
		            var brickY = (r*(brick.height+brick.padding))+brick.offsetTop;
		            bricks[c][r].x = brickX;
		            bricks[c][r].y = brickY;
		            ctx.beginPath();
		            ctx.rect(brickX, brickY, brick.width, brick.height);
		            ctx.fill();
		            ctx.closePath();
		    	}
	      	}
	    }
 }
//..................brick ending heare


var ball = {}; // this is to draw the ball, dimensions and movements of directon 
	ball.radius = 10;

	ball.x = canvas.width/2;
	ball.y = canvas.height - 30;

	ball.dx = 1;
	ball.dy = -1;

	ball.speed = 3;

	ball.move = function () { 
		ball.x = ball.x + (ball.speed * ball.dx);
		ball.y = ball.y + (ball.speed * ball.dy);
	}

	ball.draw = function () {
		ctx.fillRect(ball.x, ball.y, 20, 20);
	}
//..............ball ends here!!

var paddle = {}; // paddle is drawn here, dimensions and movements also
	paddle.height = 10;
	paddle.width = 75;

	paddle.x = (canvas.width - paddle.width)/2;
	paddle.y = canvas.height - paddle.height;

	paddle.draw = function () {
		ctx.fillRect(paddle.x, paddle.y, 60, 10);
	}

	paddle.move = function () { 
		document.getElementById("stage").addEventListener("mousemove", mouseMoveHandler, false);
		function mouseMoveHandler(event) {
			var relX = event.clientX - canvas.offsetLeft;
			if (relX > 0 && relX<canvas.width) {
			paddle.x = relX - paddle.width/2;
			}
		}
	}


function bounce() {
	if (ball.x > canvas.width - 20) {
			ball.dx = -1;
	}

	if (ball.y == 0) {
			ball.dy = 1;

		} else if (ball.y > canvas.height - 30) {
	    	if (ball.x + 20 > paddle.x && ball.x + 20 < paddle.x + paddle.width) {
	        ball.dy = -1;
	        document.getElementById("paddlesound").play();
	    } else {
	    	ctx.font = "30px Arial";
			ctx.fillText("Game Over!", 240, 200);

	    	alert("Ohh!! have another try?");
	    	document.location.reload();
	    }
	}

	if (ball.x == 0) {
			ball.dx = 1;
	}

// ball hitting the wall checker

	for(c=0; c<brick.column; c++) {  
	    for(r=0; r<brick.row; r++) {
	        if (bricks[c][r].status == 1) {
	            if (ball.x > bricks[c][r].x && ball.x < bricks[c][r].x+brick.width && ball.y > bricks[c][r].y && ball.y < bricks[c][r].y+brick.height) {
	                ball.dy = 1;
	                bricks[c][r].status = 0;

	                score++;

	                document.getElementById("bricksound").play();
	            }
	        }
	    }
	}

}




var score = 0; // printing current score 

function scoreCount() {
	ctx.font = "16px Arial";
	ctx.fillText("Score: " + score, 10, 390);

	if (score == brick.row * brick.column) {
		ctx.font = "24px Arial";
		ctx.fillText("You Won!", 200, 240);

	    alert("Try again?");
	    document.location.reload();
	}
}


function update() { // this is for the ball movement
  ctx.clearRect(0,0,canvas.width, canvas.height);

  	brick.draw();
  	paddle.draw();
  	ball.draw();

  	ball.move();
  	paddle.move();

  	bounce();
  	scoreCount();

    requestAnimationFrame(update);    
  }

ID = requestAnimationFrame(update);

//Conerlious Sagandira Lab9 Revision 2017 Javascript