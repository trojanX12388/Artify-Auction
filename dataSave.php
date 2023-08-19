<?php

    $filteredData=substr($_POST['imghidden'],strpos($_POST['imghidden'],',')+1);
    $DecodeData=base64_decode($filteredData);

    //Now you can upload image inside the folder
    $imgPath='img'.time().'.png';
    file_put_contents($imgPath,$DecodeData);

?>