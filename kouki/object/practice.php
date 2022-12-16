<?php
require_once './student.php';
require_once './dao.php';

$db = new dao('localhost','root','','ph23_sample');
$db->query("SELECT name,ph,cs,mk FROM student;");

$student_list = [];
while($row = $db->get_row()){
    $student = new student($row['name'],$row['ph'],$row['cs'],$row['mk']);
    $student_list[] = $student;
}



/* INSERT INTO student (name,ph,cs,mk) VALUES ("永井",55,55,66); */

require_once './tpl/index.php';
?>