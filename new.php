<?php
include('DatabaseConfig.php');
$sql = "SELECT *  FROM Assets";  
$stmt = sqlsrv_query( $conn, $sql);

if( $stmt === false)
{
   echo "Error in query preparation/execution.\n";  
   die( print_r( sqlsrv_errors(), true));  
}

$json = array();

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
{    
     $json[] = $row;
}

echo json_encode($json);
?>