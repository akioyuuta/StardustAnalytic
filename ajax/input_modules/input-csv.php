<?php

// New File Name
$filename = date('Y-m-d H:i:s');
$filename = md5($filename);
$filename = crc32($filename);

// Get Extention
$tmp = explode(".", $_FILES['csv-file-input']['name']);
$ext = $tmp[count($tmp) - 1];

// Defile Target
$file = $filename.".".$ext;
$target = "../../process/".$file;

// Move File
move_uploaded_file($_FILES['csv-file-input']['tmp_name'], $target);

?>
