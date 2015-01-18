<?php
	include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $app_name; ?></title>
    
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>


   	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.1/cosmo/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/wordseach.css" />
    <link rel="stylesheet" href="css/style.css" />

  </head>
  <body>
	<br/>
	<div class="container">
		<div class="well">
			<div class="wrap">
				
				<table class="table">
					<col width="33%">
					<col width="33%">
					<col width="33%">
					<h1 class="logo"><?php echo $app_name; ?></h1>
					<p><?php echo $app_slogan; ?></p>
					<tr>
						<td><a href="#" class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#newgame">New Game</a></td>
						<td><a href="#" class="btn btn-warning btn-block btn-sm" data-toggle="modal" data-target="#fastestgame">Leaderboard</a></td>
						<td><a href="#" class="btn btn-success btn-block btn-sm" data-toggle="modal" data-target="#about">About Game</a></td>
					</tr>
				</table>
				
				<select id= "mySelect" class="form-control" width="100"></select>
				<br />
				<section id="ws-area"></section>
				<div id="clockCounter" hidden></div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3 text-center"><small><?php echo $app_name; ?> is based on <a href="https://github.com/lizhineng/word-search-game">word-search-game</a> by <a href="https://github.com/lizhineng">lizhineng</a>.</small></div>
			</div>
			<p hidden id="gameTypeElem">1</p>
			<p hidden id="itemsFound1" name="itemsFound1">0</p>
		</div>
	</div>
    
    <script src="js/utility.js"></script>
    <script src="js/wordsearch.js"></script>
    <script src="js/extrafuncs.js"></script>

    <script type="text/javascript">	  
	  startPuzzle(1);
    </script>
    
    <div class="modal" id="about">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
					<h4 class="modal-title">About</h4>
				</div>
				<div class="modal-body">
					<p><?php echo $app_name; ?> is a simple "find-the-words" game that was originally forked from <a href="https://github.com/lizhineng/word-search-game">word-search-game</a> by <a href="https://github.com/lizhineng">lizhineng</a>.</p>
					<p>The current game is still under development and we would love to see people help contribute to making this otherwise boring game into an enjoyable and fun game for the whole family.</p>
					<br/>
					<p>Forked by <a href="https://github.com/rgloginja1">rgloginja1</a> of RMG Software Pty Ltd on Saturday 17th January 2015.</p>
					<p>For more information, please visit our <a href="https://github.com/rgloginja1/word-search-game">GitHub repo</a>.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
    <div class="modal" id="newgame">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
					<h4 class="modal-title">New Game</h4>
				</div>
				<div class="modal-body">
					<p>Are you ready to see if you will make it to the <?php echo $app_name; ?> Leaderboard?</p>
					<p>Hold your mouse over each button for a brief description of your goal for each game and click that button to start your game.</p>
					<small>NB. <?php echo $app_name; ?> not working on your mobile? This game was originally designed for use with browsers on PC's and laptops. We will be making an effort to make this work on all devices, including mobile devices, in the near future.</small>
					<table class="table">
						<col width="33%">
						<col width="33%">
						<col width="33%">
						<tr>
							<td><button data-dismiss="modal" class="btn btn-primary btn-block btn-sm" onclick="startPuzzle(1);" title="Play a game with words from one random category.">Standard Game</button></td>
							<td><button data-dismiss="modal" class="btn btn-warning btn-block btn-sm" onclick="startPuzzle(2);" title="Play a game with random words from random categories.">Random Game</button></td>
							<td><button data-dismiss="modal" data-toggle="modal" data-target="#timedgame" class="btn btn-success btn-block btn-sm" title="Play a game with random words from random categories and get your name on the Leaderboard.">Timed Game</button></td>							
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	 <div class="modal" id="timedgame">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
					<h4 class="modal-title">Timed Game</h4>
				</div>
				<div class="modal-body">
					<p>Timed Games for <?php echo $app_name; ?> are still being developed.</p>
					<p>Please be patient as we iron out all the kinks in <?php echo $app_name; ?>.</p>
					<p></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" onclick="newClock();" data-dismiss="modal">Start</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal" id="fastestgame">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
					<h4 class="modal-title">Leaderboard</h4>
				</div>
				<div class="modal-body">
					<p>Are you in the Leaderboard? Find all your words in record time and your name will be here.</p>
					<table class="table">
						<thead>
							<tr>
								<td>Place</td>
								<td>Name</td>
								<td>Game #</td>
								<td>Time</td>
							</tr>
						</thead>
						<tr>
							<td>1st</td>
							<td>Rob Gloginja</td>
							<td>123456</td>
							<td>10 seconds</td>
						</tr>
						<tr>
							<td>2nd</td>
							<td>Liss Hanley</td>
							<td>123456</td>
							<td>12 seconds</td>
						</tr>
						<tr>
							<td>3rd</td>
							<td>Joel Lidster</td>
							<td>123456</td>
							<td>14 seconds</td>
						</tr>
						<tr>
							<td>4th</td>
							<td>Steve O'Leary</td>
							<td>123456</td>
							<td>16 seconds</td>
						</tr>
						<tr>
							<td>5th</td>
							<td>Nara Edwards</td>
							<td>123456</td>
							<td>18 seconds</td>
						</tr>
						<tr>
							<td>6th</td>
							<td>Fred Smith</td>
							<td>123456</td>
							<td>20 seconds</td>
						</tr>
						<tr>
							<td>7th</td>
							<td>Tony Abbott</td>
							<td>123456</td>
							<td>22 seconds</td>
						</tr>
						<tr>
							<td>8th</td>
							<td>John Citizen</td>
							<td>123456</td>
							<td>24 seconds</td>
						</tr>
						<tr>
							<td>9th</td>
							<td>Christopher Poole</td>
							<td>123456</td>
							<td>26 seconds</td>
						</tr>
						<tr>
							<td>10th</td>
							<td>Kate Jones</td>
							<td>123456</td>
							<td>28 seconds</td>
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
  </body>
</html>
