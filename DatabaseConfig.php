<?php
    $serverName = "LAPTOP-IHU13P73"; 
    $uid = "localhost";   
    $pwd = "admin123";  
    $databaseName = "Session5"; 
    
    $connectionInfo = array( "UID"=>$uid,                            
                             "PWD"=>$pwd,                            
                             "Database"=>$databaseName); 
    
    /* Connect using SQL Server Authentication. */  
    $conn = sqlsrv_connect( $serverName, $connectionInfo); 
    
  
    
?>
