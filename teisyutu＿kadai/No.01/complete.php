<?php
session_start();

// index・confirmを通ってきたかの判定
if(isset($_SESSION['name']) && isset($_SESSION['age'])){

    $name = $_SESSION['name'];
    $age = $_SESSION['age'];
    $id = $_SESSION['id'];


    session_destroy();

}else{

    header('Location:./index.php');
    exit;

}

require_once './tpl/complete.php';

?>