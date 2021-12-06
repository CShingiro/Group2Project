<?php

	function prepare_string($dbc, $string) {
		$string = mysqli_real_escape_string($dbc, trim($string));
		return $string;
	}

	define('DB_USER', get_env('CLOUDSQL_USER'));
	define('DB_PASSWORD', get_env('CLOUDSQL_PASSWORD'));
	define('DB_HOST', get_env('CLOUDSQL_DSN'));
	define('DB_NAME', get_env('CLOUDSQL_DB'));

	$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
		OR die('Could not connect to MySQL: ' . mysqli_connect_error());
	mysqli_set_charset($dbc, 'utf8');
?>
