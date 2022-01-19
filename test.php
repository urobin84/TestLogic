<?php
$matrix = [];
function solution($a) {
    // Your code starts here.
    $matrix = [];
    $position = [];
    if(is_numeric($a) && $a>=1 && $a<=1000){
        for($i=1;$i<=$a;$i++){ //COLUMN
            for($j=1;$j<=$a;$j++){ //ROW
                if($j==1 && $i==1){
                    $val = 1;
                }elseif($j==1){
                    $val = $matrix[$i-2][$j-1]+($i-1);
                }elseif($i==1){
                    $val = $matrix[$i-1][$j-2]+$j;
                }elseif($j%2==0 && $i%2==0){
                    $tambahan = ($matrix[$i-1][$j-2]-$matrix[$i-2][$j-2])+1;
                    $val = $matrix[$i-2][$j-1]+$tambahan;
                }else if($j%2==0 && $i%2==1){
                    $val = $matrix[$i-2][$j-1]+($j+1);
                }else if($j%2==1 && $i%2==0){
                    $tambahan = ($matrix[$i-1][$j-2]-$matrix[$i-2][$j-2])+1;
                    $val = $matrix[$i-2][$j-1]+$tambahan;
                }else if($j%2==1 && $i%2==1){
                    $val = $matrix[$i-2][$j-1]+($j+1);
                }
                $matrix[$i-1][$j-1] = $val;
                array_push($position,["value" => $val, "position" => "$j, $i"]);
            }
        }
    }

    return $position;
}
$search = 19;
$matrix = solution(6);
//print_r($matrix);
$result_search = $matrix[array_search($search, array_column($matrix, 'value'))]['position'];
var_dump($result_search);

