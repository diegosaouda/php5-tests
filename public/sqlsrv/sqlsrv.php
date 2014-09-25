<?php
$serverName = "D-SAOUDA"; //serverName\instanceName
$connectionInfo = array( "Database"=>"sanegas", "UID"=>"dsaouda", "PWD"=>"dsaouda");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

echo "<pre>";

if( $conn ) {
     echo "Connection established.<br />";

	$sql = "SELECT * FROM Chamado";
	$stmt = sqlsrv_query( $conn, $sql );
	if( $stmt === false) {
    	die( print_r( sqlsrv_errors(), true) );
	}

	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
		print_r($row);
	}


}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}