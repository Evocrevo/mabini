<?php
$serverName = "localhost";
$connectionInfo = array( "Database"=>"Session1", "UID"=>"", "PWD"=>"" );
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}

//$tsql = "SELECT Assets.ID, Assets.AssetSN, Assets.AssetName, Assets.WarrantyDate, Departments.Name, AssetGroups.Name, Assets.DepartmentLocationID,Assets.AssetGroupID, Assets.EmployeeID, Assets.Description, Departments.ID FROM assets JOIN departments ON assets.ID = departments.ID JOIN AssetGroups ON Assets.ID = AssetGroups.ID FOR JSON AUTO;";
//$tsql = "SELECT Assets.AssetName, Assets.AssetSN, Departments.Name FROM Assets Join Departments ON Assets.ID = Departments.ID FOR JSON AUTO;";
/* Execute the query. */
$tsql = "SELECT 
Assets.ID,
Assets.AssetSN,
Assets.AssetName,
Assets.warrantyDate,
Departments.Name AS DepartmentName,
AssetGroups.Name AS AssetGroupName,
DepartmentLocations.LocationID AS DepartmentLocationID,
Assets.AssetGroupID,
Assets.EmployeeID,
Assets.Description,
DepartmentLocations.ID AS DepartmentID
FROM AssetGroups
JOIN Departments
ON AssetGroups.ID = departments.ID
JOIN DepartmentLocations
ON AssetGroups.ID = DepartmentLocations.ID
JOIN Assets 
ON AssetGroups.ID = Assets.AssetGroupID FOR
JSON AUTO;" ;

$stmt = sqlsrv_query($conn, $tsql);

if ($stmt) {

} else {
    echo "Error in statement execution.\n";
    die(print_r(sqlsrv_errors(), true));
}

/* Iterate through the result set printing a row of data upon each iteration.*/

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)) {
    echo "" . $row[0] . "\n";

}

/* Free statement and connection resources. */
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
