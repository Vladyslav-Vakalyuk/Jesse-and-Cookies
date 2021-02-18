
<?php

/*
 * Complete the cookies function below.
 */
function cookies($k, $A) {
$step = 0;
do{
    $step++;
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

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%[^\n]", $nk_temp);
$nk = explode(' ', $nk_temp);

$n = intval($nk[0]);

$k = intval($nk[1]);

fscanf($stdin, "%[^\n]", $A_temp);

$A = array_map('intval', preg_split('/ /', $A_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = cookies($k, $A);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
