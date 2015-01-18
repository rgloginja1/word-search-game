function removeOptions(selectbox)
{
	// This function clears a select box so we do not have
	// duplicate entries everytime we request a new game.
    var i;
    for(i=selectbox.options.length-1;i>=0;i--)
    {
        selectbox.remove(i);
    }
}

function ClearOldPuzzle() {
	document.getElementById('ws-area').innerHTML='';
	console.log("ClearOldPuzzle success"); 
	
	var clockDIV = document.getElementById('clockCounter');
	clockDIV.style.display = 'none';
}

      function startPuzzle(clear) {
		  // This will clear anything that is in mySelect
		  // to prevent duplications on New Game
		  removeOptions(document.getElementById("mySelect"));
		  
		  if(clear == 1){
			try {
				ClearOldPuzzle();
				document.getElementById("gameTypeElem").innerHTML = "1";
				console.log('ClearOldPuzzle = 1');
			} catch(err) {
				console.log('ClearOldPuzzle() was not fired');
			} 
		  } else if (clear == 2) {
			try {
				ClearOldPuzzle();
				document.getElementById("gameTypeElem").innerHTML = "2"
				console.log('ClearOldPuzzle = 2');
			} catch(err) {
				console.log('ClearOldPuzzle() was not fired');
			} 	
		  } else if (clear == 3) {
			 try {
				ClearOldPuzzle();
				document.getElementById("gameTypeElem").innerHTML = "3"
				console.log('ClearOldPuzzle = 3');
			} catch(err) {
				console.log('ClearOldPuzzle() was not fired');
			} 	 
		  } else {
			  console.log('ClearOldPuzzle() was not fired - Did the user just load the page?');
		  }
		  
		  var gameAreaEl = document.getElementById('ws-area');
		  var gameobj = gameAreaEl.wordSeach();

		  // Put words into `.ws-words`
		  var words = gameobj.settings.words, wordsWrap = document.querySelector('.ws-words');
		  
		  for (i in words) {
			var x = document.getElementById("mySelect");
			var option = document.createElement("option");
			option.setAttribute('id', words[i]);
			option.text = words[i];
			x.add(option);
		  }
	  }
	  
    function newClock() {
		startPuzzle(3);
		
		var clockDIV = document.getElementById('clockCounter');
		clockDIV.style.display = 'block';
	
		$('#clockCounter').html('<div id="clock"><br/><label id="minutes">00</label>:<label id="seconds">00</label><br/></div>');
		
		var totalSeconds = 0;

		var myVar = setInterval(function() { 
			setTime();
			
			var counterDIV = document.getElementById('itemsFound1').innerHTML;
			
			if (counterDIV == '10') {
				console.log('You found all the words!');
				myStopFunction();
			} else {
				console.log('You are now on ' + counterDIV);
			}
		}, 1000);
	
		function setTime(){
			++totalSeconds;
			$('#clock > #seconds').html(pad(totalSeconds%60));
			$('#clock > #minutes').html(pad(parseInt(totalSeconds/60)));
			
		}
        
		function pad(val){
			var valString = val + "";
			if(valString.length < 2) {
				return "0" + valString;
			} else {
				return valString;
			}
		}
    
		function myStopFunction() {
			console.log('The timer has stopped.');
			clearInterval(myVar);
		}
	}
