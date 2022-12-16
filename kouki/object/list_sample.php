<?php
require_once './student_db_dao.php';
require_once './student.php';
require_once './dao.php';

$student_dao = new student_db_dao();
$student_list = $student_dao->get_student_list();

require_once './tpl/index.php';
?>