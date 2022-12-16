<?php
$work = 'isen';
for($i=0;$i<10000;$i++){
    $work = md5('hal'.$work);
}
echo $work;

?>