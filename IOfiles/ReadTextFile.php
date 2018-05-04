<?php

$fp= fopen("./people.txt", "r");
/*
while ($data= fread($fp, 10)){
    echo $data;
    
}*/
while ($data= fgets($fp)){
    echo $data;
}

fclose($fp);


echo (file_get_contents("people.txt"));

