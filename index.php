<?php


function cookies($k, $A) {
$step = 0;
do{
    $step++;
    // list($first, $two) = $A;
    if(count($A) < 2) return -1;
    $newCookie = 1 * array_shift($A) + 2 * array_shift($A);
    $A[]=$newCookie;
    sort($A);
}while(!checkIfAllCoockiesIsBiggerThanSomeValue ($k, $A));
return $step;
}
function checkIfAllCoockiesIsBiggerThanSomeValue ($value, $cookies){
    $result = true;
    foreach($cookies as $cookie){
        if($cookie < $value){
            $result = false;
        }
    }
    return $result;
}
