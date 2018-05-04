<?php
namespace lib\maths\B;

function doMaths($first, $second, $operator){ 
    if ($operator=='+'){
        return $first+$second;
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

