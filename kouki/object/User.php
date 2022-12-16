<?php
class User{
    private $name;
    private $login_id;
    private $password;
    private $stretch;
    private $salt;

    public function __construct($name,$login_id,$password,$stretch,$salt){
        $this->name = $name;
        $this->login_id = $login_id;
        $this->password = $password;
        $this->stretch = $stretch;
        $this->salt = $salt;
    }

/*     public function __destruct($val){
        $this->name = $val;
    } */

    public function get_hash_password(){
        for($i = 0; $i < $this->stretch; $i++){
            $this->password = md5($this->salt . $this->password);
        }
        return $this->password;
    }

    public function set_name($val){
        $this->name = $val;
    }
    public function set_login_id($val){
        $this->login_id = $val;
    }
    public function set_password($val){
        $this->password = $val;
    }
    public function set_stretch($val){
        $this->stretch = $val;
    }
    public function set_salt($val){
        $this->salt = $val;
    }

    public function get_name(){
        return $this->name;
    }
    public function get_login_id(){
        return $this->login_id;
    }
    public function get_password(){
        return $this->password;
    }
    public function get_stretch(){
        return $this->stretch;
    }
    public function get_salt(){
        return $this->salt;
    }
}

class User_yamada extends User{
    public $hige;
}
?>