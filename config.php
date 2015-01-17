<?php
	# db configuration 
	define('DB_HOST', '');
	define('DB_USER', '');
	define('DB_PASS', '');
	define('DB_NAME', '');

	$link = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die('Could not connect to MySQL database ') . mysql_error();
	$db = mysql_select_db(DB_NAME, $link);

	# App Configuration
	$app_name = "Word Finder";
	$app_slogan = "Words. Words. Words.";
	
	# Here you can provide a name from the following list: cerulean,
	# cosmo, cyborg, darkly, flatly, journal, lumen, paper, readable,
	# sandstone, simplex, slate, spacelab, superhero, united, yeti
	# 
	# For more information, please visit http://www.bootstrapcdn.com/#bootswatch_tab
	$app_theme = "cosmo";
	
?>
