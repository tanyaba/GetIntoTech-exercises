<?php

$handle= fopen("program.csv", "r");

while ($line= fgetcsv($handle)){
        if ($line[0]!=''){
    echo "channel: ".$line[0]."</br>";
    echo 'program: '. $line[1]."</br>";
    echo 'start: '. $line[2].'</br>';
    echo 'end: '. $line[3]."</br>";
    }
}

