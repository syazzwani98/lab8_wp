<?php
/*******MySQLi******/

//Step 1: Connecting to a Database using MySQLi API (Object-Oriented approach)
// modify these variables for your installation
$databaseHost = 'localhost';
$databaseName = 'seclub';
$databaseUsername = 'uuser';
$databasePassword = 'userpwd';

//MySQLi Object-Oriented approach
$conn = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

//MySQLi Procedural
//$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

//Step 2: Handling Connection Errors - mysqli 
// mysqli_connect_errno returns the last error code
if ( mysqli_connect_errno() ) {
	// die() is equivalent to exit()
	die( "Database connection failed: " . mysqli_connect_error() );	
	
}
//echo "Database connected successfully <br>";


?>
