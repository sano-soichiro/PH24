<?php

class Input{
  // static => インスタンス化しなくても動かせるメソッド
  static public function text($name , $value , $calss = ''){
    $statu_class = '';
    if($calss != ''){
      $statu_class = 'class="' . $calss . '"';
    }
    echo '<input'. $statu_class . ' type="text" name="' . $name . '" value="' . $value . '">' . "\n";
  }

  static public function hidden($name , $value){
    echo '<input type="hidden" name="' . $name . '" value="' . $value . '">';
  }

  static public function radio($name , $value_list , $checked = ''){
    foreach($value_list as $value){
      $check_option = '';
      if($value == $checked){
        $check_option = 'checked="checked"';
      }
      echo '<input type="radio" name="' . $name . '" value="' . $value . '" ' . $check_option . '>' . "\n";
    }
  }

  static public function select($name , $value , $point){
    $select = '<select name="' . $name . '">';
    $i = 0;
    foreach($value as $key => $val){
      if($i == $point){
        $select = $select.'<option value="' . $key . '" selected="selected">' . $val . '</option>';        
      }else{
        $select = $select.'<option value="' . $key . '">' . $val . '</option>';
      }
      $i++;
    }
    echo $select;
  }
}