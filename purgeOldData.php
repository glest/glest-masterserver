<?php

	// This script can be invoked directly by a cron job on a regular basis:
	// /path/to/php -f /path/to/purgeOldData.php

	define( 'INCLUSION_PERMITTED', true );
	require_once( 'config.php' );
	require_once( 'functions.php' );

	define( 'DB_LINK', db_connect() );

	purgeOldData();

	db_disconnect( Registry::$mysqliLink );
?>