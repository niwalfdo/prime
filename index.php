<?php
$startTime=time();
$primes=array(2,3,5,7);
$numbers=array();

$start = 3;
$end = 100;
for($t=1; $t<=5000; $t++){

    for($i=$start; $i<=$end; $i+=2){
        array_push($numbers,$i);
    }

    $upperLimit = (int)sqrt($end);

    for($j=0; $j<count($primes); $j++){
        if($primes[$j]>$upperLimit){
            break;
        }else{
            foreach($numbers as $num){
                if($num%$primes[$j]==0){            
                    $numbers=array_diff($numbers, array($num));            
                }
            } 
        }          
    }

    foreach($numbers as $prime){
        array_push($primes, $prime);
    }

    $numbers=array();
    $start=$i;
    $end=$start+99;

}

$endTime=time();
print_r($primes);
echo '<br>Total Time :'.($endTime-$startTime);
