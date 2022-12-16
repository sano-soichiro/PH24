<?php

require_once './user.php';

$link = mysqli_connect( 'localhost' , 'root' ,'' , 'ph23_sample');
mysqli_set_charset($link, 'utf8');

$result = mysqli_query($link, "SELECT * FROM check_bmi;");
$user_list = [];
while($row = mysqli_fetch_assoc($result)){
  $user = null;
  if($row['id'] % 10 == 1){
    $user = new User(0,0);
    $user->set_value($row['height'],$row['weight']);
  }
  else if($row['id'] % 10 == 2){
    $user = new User(0,0);
    $user->set_height($row['height']);
    $user->set_weight($row['weight']);
  }
  else if($row['id'] % 10 == 3){
    $user = new User(0,0);
    $user->set_height($row['height']);
    $user->set_weight('hal');
  }
  else if($row['id'] % 10 == 4){
    $user = new User(0,0);
    $user->set_height('hal');
    $user->set_weight($row['weight']);
  }
  else{
    $user = new User($row['height'],$row['weight']);
  }

  $user_list[] = $user;
}

mysqli_close($link);

$color_list = [
  'red' => 'table-danger' , 
  'white' => '' ,
  'blue' => 'table-info' ,
];
require_once './tpl_index.php';