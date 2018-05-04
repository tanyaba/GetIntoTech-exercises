<?php
set_include_path(get_include_path() . PATH_SEPARATOR . "/Applications/XAMPP/xamppfiles/htdocs/NetBeansProjects/Exercise11/library/maths");
//include 'library/maths/mathsA.php';
//include 'library/maths/mathsB.php';
include 'mathsA.php';
include 'mathsB.php';
use function lib\maths\B\doMaths;

echo 'First number: ';
$first= stream_get_line(STDIN, 10, "\n");
echo 'Operation: ';
$operator= stream_get_line(STDIN, 2, "\n");
echo 'Second number: ';
$second= stream_get_line(STDIN, 10, "\n");

//$result= lib\maths\A\doMaths($first, $second, $operator);
$result= doMaths($first, $second, $operator);
echo "\nThe answer is $result.";


