<?php  

/* Connect using SQL Server Authentication. */  

$response = array();  
   if (isset($_POST['type']) && isset($_POST['insert']) ) {  
      $AssetName = $_POST['txtAssetName'];  
      $Description= $_POST['txtDescription'];  
      $WarrantyDate = $_POST['txtExpired'];  
      // include db connect class  
      $result = sqlsrv_query("INSERT INTO [dbo].[Assets]
      ([AssetSN]
      ,[AssetName]
      ,[DepartmentLocationID]
      ,[EmployeeID]
      ,[AssetGroupID]
      ,[Description]
      ,[WarrantyDate])
VALUES('05/04/0001','Toyota Hilux FAF321',' ',' ','$AssetName', '$Description', '$WarrantyDate')");  
      // check if row inserted or not  
      $serverName = "localhost"; 
      $uid = "";   
      $pwd = "";  
      $databaseName = "Session1"; 

      $connectionInfo = array( "UID"=>$uid,                            
                         "PWD"=>$pwd,                            
                         "Database"=>$databaseName); 
      $conn = sqlsrv_connect( $serverName, $connectionInfo); 
      $stmt = sqlsrv_query( $conn, $result);  
      
      if ( $stmt )  
      {  
           echo "Success";
      }   
      else   
      {  
           echo "Error in statement execution.\n";  
           die( print_r( sqlsrv_errors(), true));  
      }
      
      // check if row inserted or not  
      if ($result) {  
         $response["success_msg"] = 1;  
         $response["message"] = "Asset successfully Insert.";  
         echo json_encode($response);  
      } else {  
         // failed to insert row  
         $response["success_msg "] = 0;  
         $response["message"] = "Asset not insert because Oops! An error occurred.";  
         // echoing JSON response  
         echo json_encode($response);  
      }  
   } 
?>