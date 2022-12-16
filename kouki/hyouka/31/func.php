<?php

function sql_list($host,$id,$password,$db_name,$sql){
    $link = mysqli_connect( $host , $id , $password , $db_name);
    if($link == false){
        mysqli_close($link);
        return false;
    }

    // SQL文がfalseじゃない時の処理
    mysqli_set_charset($link,'utf8');
    if($result = mysqli_query($link,$sql)){
        // SQL文を配列に代入
        $list = [];
        while($row = mysqli_fetch_assoc($result)){
            $list[] = $row;
        }
        mysqli_close($link);
        return $list;
    }
    mysqli_close($link);
    return false;
}

?>