<?php
	
	# wordharvest.php extracts random words from the database 
	# and than displays the results for the game to be played.
	#
	# A random category is selected (TO BE UPDATED TO THIS FILE)
	# and a selection is extracted from the database.
	
	include('config.php');
	
	$gameTypeSQL = $_GET['gameType'];

	# Determine what the gameType is.
	# 1. Standard Game - Random words from ONE selected category from the standard table
	# 2. Random Game - Random words from random categories from the standard table - The table will be changed to user submitted
	# 3. Timed Game - ???
	if ( $gameTypeSQL == "1" ) {
		$sqlSelectRandomCat = "SELECT `cat` FROM `cats` ORDER BY RAND() LIMIT 1;";
		$querySelectRandomCat = mysql_query($sqlSelectRandomCat) or die ('<META HTTP-EQUIV="Refresh" CONTENT="0;URL=dberror.php">');
		while($rowSelectRandomCat = mysql_fetch_assoc($querySelectRandomCat)) {
			$selectedCat[] = $rowSelectRandomCat;
		}
		$sql = "SELECT `word` FROM `standard` WHERE `cat` = '".$selectedCat[0]['cat']."' ORDER BY RAND() LIMIT 10;";
	} elseif ( $gameTypeSQL == "2" ) {
		$sql = "SELECT `word` FROM `standard` ORDER BY RAND() LIMIT 10;";
	} elseif ( $gameTypeSQL == "3") {
		$sqlSelectRandomCat = "SELECT `cat` FROM `cats` ORDER BY RAND() LIMIT 1;";
		$querySelectRandomCat = mysql_query($sqlSelectRandomCat) or die ('<META HTTP-EQUIV="Refresh" CONTENT="0;URL=dberror.php">');
		while($rowSelectRandomCat = mysql_fetch_assoc($querySelectRandomCat)) {
			$selectedCat[] = $rowSelectRandomCat;
		}
		$sql = "SELECT `word` FROM `standard` WHERE `cat` = '".$selectedCat[0]['cat']."' ORDER BY RAND() LIMIT 10;";
	} else {
		# This shouldn't happen - But who knows?
		$sql = "SELECT `word` FROM `standard` WHERE `cat` = 'countries' ORDER BY RAND() LIMIT 10;";
	}
	$query = mysql_query($sql) or die ('<META HTTP-EQUIV="Refresh" CONTENT="0;URL=dberror.php">');
	
	while($row = mysql_fetch_assoc($query)) {
		$data[] = $row;
	}
	
	echo json_encode(array("w1"=>$data[0]['word'], "w2"=>$data[1]['word'], "w3"=>$data[2]['word'], "w4"=>$data[3]['word'], "w5"=>$data[4]['word'], "w6"=>$data[5]['word'], "w7"=>$data[6]['word'], "w8"=>$data[7]['word'], "w9"=>$data[8]['word'], "w10"=>$data[9]['word'])); 
		
?>
