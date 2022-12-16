<?php
try{
    $db = new PDO('mysql:dbname=ph23_sample;host=localhost;charset=utf8','root','');
    $db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
}
catch(PDOException $e){

}
catch(Exception $e){

}
finally{

}

?>