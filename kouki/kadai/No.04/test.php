<?php
require_once 'user.php';

$user = new User(170.9 , 58.8);
$height = $user->get_height();
$weight = $user->get_weight();
$bmi = $user->get_bmi();
$result = $user->get_result();
$color = $user->get_result_color();

var_dump($height);
var_dump($weight);
var_dump($bmi);
var_dump($result);
var_dump($color);
?>