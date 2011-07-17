<?php

	define( 'INCLUSION_PERMITTED', true );
	require_once( 'config.php' );
	require_once( 'functions.php' );

	define( 'DB_LINK', db_connect() );

	$scenarios_in_db = mysql_db_query( MYSQL_DATABASE, 'SELECT * FROM glestscenarios WHERE disabled=0 ORDER BY scenarioname;' );
	$all_scenarios = array();
	while ( $scenario = mysql_fetch_array( $scenarios_in_db ) )
	{
		array_push( $all_scenarios, $scenario );
	}
	unset( $scenarios_in_db );
	unset( $scenario );

	db_disconnect( DB_LINK );

	// Representation starts here
	header( 'Content-Type: text/plain; charset=utf-8' );
	foreach( $all_scenarios as &$scenario )
	{
		$outString =
			"${scenario['scenarioname']}|${scenario['crc']}|${scenario['description']}|${scenario['url']}|${scenario['imageUrl']}|";
		$outString = $outString . "\n";
		
		echo ($outString);
	}
	unset( $all_scenarios );
	unset( $scenario );
?>
