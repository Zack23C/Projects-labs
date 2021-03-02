
var rounds = 0;
var correctNumber = Math.floor(Math.random()*100)+1;
var guess;
var data = 'Guess a number between 1 and 100';

while(true){
	guess = prompt(data);
	rounds++;
	if(guess == correctNumber){
		nhume = 'Hello' + 'correct answer';
		console.log(nhume);
		break;
	}
else{
		if(guess<correctNumber){
			nhume1 ='the answer is low';
			console.log(nhume1);

}
	else{
		nhume2 ='OOPS! Watadza the answer is too high than expected';
		console.log(nhume2);
	}
if(rounds == 10){
	nhume3 = "Guess is over";
	console.log(nhume3);
	break;
}

	console.log("Guess" + rounds + "is" + guess);
}
}
