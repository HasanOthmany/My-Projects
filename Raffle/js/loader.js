var ctx = document.getElementById('circularLoader').getContext('2d');
var al = 0;
var start = 4.72;
var cw = ctx.canvas.width;
var ch = ctx.canvas.height; 
var diff;
var sim;
var modalWinnerName = document.querySelector('#modal')

function progressSim(){
	diff = ((al / 100) * Math.PI*2*10).toFixed(2);
	ctx.clearRect(0, 0, cw, ch);
	ctx.lineWidth = 17;
	ctx.fillStyle = '#4285f4';
	ctx.strokeStyle = "#4285f4";
	ctx.textAlign = "center";
	ctx.font="28px monospace";
	ctx.fillText(al+'%', cw*.52, ch*.5+5, cw+12);
	ctx.beginPath();
	ctx.arc(100, 100, 75, start, diff/10+start, false);
	ctx.stroke();
	if(al >= 100){
		clearTimeout(sim);
	    // Add scripting here that will run when progress completes
		myModal.show(); // After the progress completes, the modal will be displayed
		loader.style.display = 'none';
		startConfetti();
		modalWinnerName.addEventListener('hidden.bs.modal', function()
	{
		// Here, we'll get the winner's name from the modal
		var winnerName = document.querySelector('#modalWinner').innerText;

		// And here, we'll set the winner's name in a card on the main page

		document.querySelector('#winnerName').innerText = winnerName;

		// We'll display the winner's name in a card below when the modal is closed
		document.querySelector('#cards').style.display = 'block';
	}
	)
	}
	al++;
}

// We'll store the button element with the ID "winner" in a constant variable here, as well as the container of the progress circle
const win = document.querySelector('#winner');

const loader = document.querySelector('.loader-container')

var myModal = new bootstrap.Modal(document.getElementById('modal'), {
  keyboard: false
});

// Now, we'll make an event that occurs upon clicking the "Choose Winner" button
win.addEventListener('click', function(){
  loader.style.display = 'block';
  sim = setInterval(progressSim, 50);
  win.style.display = 'none';

   // setTimeout(function(){
     // myModal.show();
     // }, 3000);
  // cards.style.display = 'flex'; /* "flex" will make the cards appear next to each other. "block" would make them all appear on top of each other */
}); /* The first parameter is the event that occurs ("click"), and the second one is the function that gets excuted */