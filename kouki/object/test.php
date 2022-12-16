<?php
require_once './User.php';
require_once './student.php';

$yamada = new User('永山','naga','test',500,'hal');

/* $yamada->name = '山田';
$yamada->password = 'test';
$yamada->salt = 'hal';
$yamada->stretch = 500; */

/* $yamada->set_name('山田');
$yamada->set_password('test');
$yamada->set_salt('hal');
$yamada->set_stretch(500); */

/* echo $yamada->get_name();
echo $yamada->get_login_id();
echo $yamada->get_password();
echo $yamada->get_stretch();
echo $yamada->get_salt();


echo $yamada->get_hash_password(); */

$student = new Student('永井',59.999999999999999,59,79);

echo $student->get_avg();
echo $student->get_fail_ph();
echo $student->get_fail_cs();
echo $student->get_fail_mk();
?>