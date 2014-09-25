<?php

$server = '192.168.9.18';
$username = 'dsaouda';
$password = 'dsaouda';
$connection = mssql_connect($server, $username, $password);

$result = mssql_query('SELECT TOP 100 * FROM [sanegas].[dbo].[negocios_empresasNovo]');
while($record = mssql_fetch_assoc($result)) {
	print_r($record);
}