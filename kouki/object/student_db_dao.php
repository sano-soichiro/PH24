<?php
class student_db_dao{
    private $db;

    public function __construct(){
        $this->db = new dao('localhost','root','','ph23_sample');
    }

    public function get_student_list(){

        $student_list = [];
        $this->db->query("SELECT name,ph,cs,mk FROM user;");

        while($row = $this->db->get_row()){
            $student_list[] = new student($row['name'],$row['ph'],$row['cs'],$row['mk']);
        }
        return $student_list;
    }

    public function insert_student($student){
        $this->db->put("INSERT INTO user (name,ph,cs,mk) VALUES ('" . $student->get_name() . "," . $student->get_ph() . "," . $student->get_cs() . "," . $student->get_mk() . ");");
    }
}
?>