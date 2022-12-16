<?php
$list = ['KH',1,2,3,4,99,12313,112,1,5,6,111,3,5,2];

require_once './func_ihb17.php';
$res = func_ihb17_01(1,50,'MAX');
var_dump($res);

$max = func_ihb17_02('KH',8);
echo $max;

$reslist = func_ihb17_03($list,'');
var_dump($reslist);

/* func_ihb17_04('localhost','root','','ph23_sample',"INSERT INTO sample (name,age) VALUES ('"."KH"."',23)"); */

$num1 = func_ihb17_05('localhost','root','','ph23_sample','t_log');
var_dump($num1);

$list2 = func_ihb17_06('localhost','root','','ph23_sample','sample2');
var_dump($list2);
?>