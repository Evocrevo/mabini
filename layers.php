<?php
include('DatabaseConfig.php');
$sql = "SELECT 
Rocktypes.BackgroundColor AS Color,
WellLayers.EndPoint,
WellLayers.StartPoint,
WellLayers.ID,
WellLayers.RockTypeID,
Rocktypes.Name AS RockTypeName,
WellLayers.WellID,
Wells.GasOilDepth,
Wells.Capacity
FROM WellLayers 
JOIN RockTypes
ON WellLayers.ID = RockTypes.ID
JOIN Wells
ON Wells.ID = RockTypes.ID";  
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