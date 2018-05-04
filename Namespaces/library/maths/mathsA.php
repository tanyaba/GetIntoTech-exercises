<?php
namespace lib\maths\A;

function doMaths($first, $second, $operator){ 
    if ($operator=='^'){
        return $first**$second;
    }
    elseif ($operator=='-') {
        return $first - $second;
    }
    elseif ($operator=='*') {
        return $first*$second;
    }
    elseif ($operator=='/') {
        return $first / $second;
    }
};

