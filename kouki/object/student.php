<?php
require_once "../../const.php";

class Student{
    // プロパティ
    private $name;
    private $ph;
    private $cs;
    private $mk;

    public function __construct($name,$ph,$cs,$mk){
        $this->name = $name;
        $this->ph = $ph;
        $this->cs = $cs;
        $this->mk = $mk;
    }

    // メソッド
    public function set_name($val){
        $this->name = $val;
    }
    public function set_ph($val){
        $this->ph = $val;
    }
    public function set_cs($val){
        $this->cs = $val;
    }
    public function set_mk($val){
        $this->mk = $val;
    }

    public function get_name(){
        return $this->name;
    }
    public function get_ph(){
        return $this->ph;
    }
    public function get_cs(){
        return $this->cs;
    }
    public function get_mk(){
        return $this->mk;
    }
    public function get_fail_ph(){
        return $this->check_fail($this->ph);
    }
    public function get_fail_cs(){
        return $this->check_fail($this->cs);
    }
    public function get_fail_mk(){
        return $this->check_fail($this->mk);
    }
    public function check_fail($num){
        if($num >= 60){
            return 'white';
        }else{
            return 'red';
        }
    }
    public function get_avg(){
        return ($this->ph + $this->cs + $this->mk) / 3;
    }
    public function get_insert(){
        return 'INSERT INTO student (name,ph,cs,mk) VALUES ('.$this->name.','.$this->ph.','.$this->cs.','.$this->mk.')';
    }
}
?>