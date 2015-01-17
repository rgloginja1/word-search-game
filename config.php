<?php
	# db configuration 
	define('DB_HOST', '');
	define('DB_USER', '');
	define('DB_PASS', '');
	define('DB_NAME', '');

	# Please delete the comment on the next line when the database
	# configuration on the above lines are set. 
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASS); # or die ('<META HTTP-EQUIV="Refresh" CONTENT="0;URL=dberror.php">');
	$db = mysql_select_db(DB_NAME, $link);

	# App Configuration
	$app_name = "Word Hunter";
	$app_slogan = "A project by RMG Software Pty Ltd";
	
	# Here you can provide a name from the following list: cerulean,
	# cosmo, cyborg, darkly, flatly, journal, lumen, paper, readable,
	# sandstone, simplex, slate, spacelab, superhero, united, yeti

	# For more information, please visit http://www.bootstrapcdn.com/#bootswatch_tab
	$app_theme = "cosmo";
	
	# Error redirection - These variable will be required for all error pages
	$take_me_home = "http://www.google.com.au";
	$contact_support = "http://www.google.com.au";

?>
