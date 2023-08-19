<?php

$serverName = "";
$uid = "sa";
$pwd = "plazma12388";
$databaseName = "Auction";

$connectioninfo = array("UID"=>$uid,
                "PWD"=>$pwd,
                "Database"=>$databaseName);

$conn = sqlsrv_connect ($serverName, $connectioninfo);


?>