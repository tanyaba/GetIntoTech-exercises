<?php

$fh = fopen("people.txt", "a");
//fwrite($fh, "\n");
$data = array ("dataName" => "Marge Simpson", 
    "dataEmail" => "marge@springfield.com", 
    "phone" => '555-332-221');

foreach ($data as $key => $value) {
    fwrite($fh, $value."\t");
}

fclose($fh);

