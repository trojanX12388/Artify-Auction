<?php
date_default_timezone_set("Asia/Manila");

echo ("<br>");
$current = date("h:i:s a");
echo $current;

header('refresh:1');
?>