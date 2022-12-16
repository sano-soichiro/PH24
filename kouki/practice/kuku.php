<?php
$list = [];
$row = 0;
$row2 = 0;
$gusu = 'gusu';
for($i=1;$i<=9;$i++){
    for($j=1;$j<=9;$j++){
        $value = $i * $j;
        if($value % 2 == 0){
            $list[$row][$row2]['num2'] = $value;
            $list[$row][$row2]['color'] = 'red';
        }else{
            $list[$row][$row2]['num2'] = $value;
            $list[$row][$row2]['color'] = 'blue';
        }
        $row2 = $row2 + 1;
    }
    $row = $row + 1;
}
require_once './view/kuku.php';
?>