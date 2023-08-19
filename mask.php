<?php

@include 'config.php';



$tsql = "SELECT * 
         FROM   ArtistAccount
         ORDER BY ArtistAccountID DESC";

$stmt = sqlsrv_query($conn, $tsql);
$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);

$integer = $row['Password'];

$numb = strval($integer);
$converted = $numb;
$strArray = count_chars($converted,1);


global $num;


foreach ($strArray as $key=>$value)
   {
   $num += $value; 
   }

function maskPhoneNumber($number){
 
    global $num;
    $subnum = $num;
    $plusnum = $num;
    $maxast = ($subnum - $plusnum);
    $minast = ($maxast+3);

    $mask_number =  str_repeat("*", strlen($number)-$minast) . substr($number, -$minast);
    
    return $mask_number;
}

echo maskPhoneNumber('plazmarocket45');



?>


