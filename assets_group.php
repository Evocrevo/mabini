<?php  
$serverName = "localhost";
$uid = "";
$pwd = "";
$databaseName = "Session1"; 

$connectionInfo = array( "UID"=>$uid,                            
                         "PWD"=>$pwd,                            
                         "Database"=>$databaseName); 

/* Connect using SQL Server Authentication. */  
$conn = sqlsrv_connect( $serverName, $connectionInfo);  

$tsql = "SELECT ID, Name FROM assetGroups FOR JSON AUTO;";  

/* Execute the query. */  

$stmt = sqlsrv_query( $conn, $tsql);  

if ( $stmt )  
{  
     
}   
else   
{  
     echo "Error in statement execution.\n";  
     die( print_r( sqlsrv_errors(), true));  
}  

/* Iterate through the result set printing a row of data upon each iteration.*/  

$json = '';
if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)) {
    $json = $row[0];
}
echo $json;
?>
