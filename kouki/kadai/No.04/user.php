<?php
class User{
    private $height;
    private $weight;

    public function __construct($height , $weight){
        if(is_numeric($height)){
            $this->height = $height;
        }else{
            $this->height = 0;
        }
        if(is_numeric($weight)){
            $this->weight = $weight;
        }else{
            $this->weight = 0;
        }
    }

    public function set_height($val){
        if(is_numeric($val)){
            $this->height = $val;
        }else{
            $this->height = 0;
        }
    }
    public function set_weight($val){
        if(is_numeric($val)){
            $this->weight = $val;
        }else{
            $this->weight = 0;
        }
    }

    public function get_height(){
        return $this->height;
    }
    public function get_weight(){
        return $this->weight;
    }

    public function set_value($height , $weight){
        if(is_numeric($height)){
            $this->height = $height;
        }else{
            $this->height = 0;
        }
        if(is_numeric($weight)){
            $this->weight = $weight;
        }else{
            $this->weight = 0;
        }
    }

    public function get_bmi(){
        if($this->height == 0 || $this->weight == 0){
            $bmi = 0;
            return $bmi;
        }
        $height = $this->height / 100;
        $bmi = $this->weight / pow($height , 2);
        return $bmi;
    }

    public function get_appropriate_weight(){
        if($this->height == 0 || $this->weight == 0){
            $app_weight = 0;
            return $app_weight;
        }
        $height = $this->height / 100;
        $app_weight = pow($height , 2) * 22;
        return $app_weight;
    }

    public function get_result(){
        if(18.5 <= $this->get_bmi() && $this->get_bmi() < 25){
            return '普通体重';
        }elseif($this->get_bmi() < 18.5){
            return '低体重(瘦せ型)';
        }elseif(25 <= $this->get_bmi() && $this->get_bmi() < 30){
            return '肥満(1度)';
        }elseif(30 <= $this->get_bmi() && $this->get_bmi() < 35){
            return '肥満(2度)';
        }elseif(35 <= $this->get_bmi() && $this->get_bmi() < 40){
            return '肥満(3度)';
        }elseif(40 <= $this->get_bmi()){
            return '肥満(4度)';
        }
    }

    public function get_result_color(){
        if($this->get_result() == '普通体重'){
            return 'white';
        }elseif($this->get_result() == '低体重(瘦せ型)'){
            return 'blue';
        }elseif(strpos($this->get_result() , '肥満') !== false){
            return 'red';
        }
    }
}
?>