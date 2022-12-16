<?php
class dao{
    protected $link;
    protected $result;

    public function __construct($host,$user,$pass,$db_name){
        $this->link = mysqli_connect($host,$user,$pass,$db_name);
        mysqli_set_charset($this->link,'utf-8');
    }

    public function put($sql){
        mysqli_query($this->link,$sql);
    }

    public function get($sql){
        $result = mysqli_query($this->link,$sql);
        $list = [];
        while($row = mysqli_fetch_assoc($result)){
            $list[] = $row;
        }
        return $list;
    }

    public function query($sql){
        $this->result = mysqli_query($this->link,$sql);
    }

    public function get_row(){
        return !is_null($row = mysqli_fetch_assoc($this->result))?$row:false;
    }

    public function __destruct(){
        mysqli_close($this->link);
    }
}
?>