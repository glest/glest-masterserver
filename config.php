<?php
//	Copyright (C) 2012 Mark Vejvoda, Titus Tscharntke and Tom Reynolds
//	The Glest Team, under GNU GPL v3.0
// ==============================================================

	if ( !defined('INCLUSION_PERMITTED') || ( defined('INCLUSION_PERMITTED') && INCLUSION_PERMITTED !== true ) ) { die( 'This file must not be invoked directly.' ); }

	define( 'PRODUCT_NAME',       'Glest' );
	define( 'PRODUCT_URL',        'https://github.com/Glest' );

	define( 'MYSQL_HOST',         'localhost' );
	define( 'MYSQL_DATABASE',     'glest_master' );
	define( 'MYSQL_USER',         'not_root' );
	define( 'MYSQL_PASSWORD',     'your_pwd' );

	// Allow using persistent MYSQL database server connections
	// This _can_ improve performance remarkably but _can_ also break stuff completely, so read up:
	// http://php.net/manual/function.mysql-pconnect.php
	// http://php.net/manual/features.persistent-connections.php
	define( 'MYSQL_LINK_PERSIST', false );

        // Show games in the games list no older than x hours
        define( 'MAX_HOURS_OLD_GAMES', 720 );

        // Purge Finished Games that are less than X minutes
        define( 'MAX_MINS_OLD_COMPLETED_GAMES', 5 );

  // Purge stats older than X months
  define( 'MAX_MONTHS_DATA_STORAGE', 1);

	// How many recently seen servers to store
	define( 'MAX_RECENT_SERVERS', 5 );

	define( 'DEFAULT_COUNTRY',    '??' );
?>
