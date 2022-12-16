<?php
session_start();
$msg = $_SESSION['msg'];

session_destroy();
require_once './tpl/complate.php';
?>