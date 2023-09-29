<?php

$serverName = "artify-auction.c5piqxwqtfey.ap-southeast-2.rds.amazonaws.com,1433";
$uid = "artify_admin";
$pwd = "PlazmaBurst12388";
$databaseName = "Auction";

$connectioninfo = array("UID"=>$uid,
                "PWD"=>$pwd,
                "Database"=>$databaseName);

$conn = sqlsrv_connect ($serverName, $connectioninfo);


?>