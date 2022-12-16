<?php
function func_ihb17_01($num1,$num2,$mm){
    if(is_numeric($num1) && is_numeric($num2)){
        if($mm == 'MAX'){
        if($num1 <= $num2){
            return $num2;
            }else{
                return $num1;
            }
        }elseif($mm == 'MIN'){
            if($num1 >= $num2){
                return $num2;
            }else{
                return $num1;
            }
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function func_ihb17_02($len,$num){
    $result = '';
    for($i=0;$i<$num;$i++){
        $result = $result.$len;
    }
    return $result;
}

function func_ihb17_03($list,$num){
    foreach($list as $key => $val){
        if($num == $val){
            return $key;
        }
    }
    return false;
}

function func_ihb17_04($host,$user,$pass,$db_name,$sql){
    $link = mysqli_connect($host,$user,$pass,$db_name);
    mysqli_set_charset($link,'utf-8');
    mysqli_query($link,$sql);
    mysqli_close($link);
}

function func_ihb17_05($host,$user,$pass,$db_name,$table){
    $row = '';
    $query = "SELECT COUNT(*) AS 'all' FROM ".$table;
    $link = mysqli_connect($host,$user,$pass,$db_name);
    mysqli_set_charset($link,'utf-8');
    $result = mysqli_query($link,$query);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($link);
    return $row['all'];
}

function func_ihb17_06($host,$user,$pass,$db_name,$table){
    $list = [];
    $query = "SELECT * FROM ".$table." ORDER BY id ASC";
    $link = mysqli_connect($host,$user,$pass,$db_name);
    mysqli_set_charset($link,'utf-8');
    $result = mysqli_query($link,$query);
    $row = mysqli_fetch_assoc($result);
    while($row){
        $list[] = $row;
        $row = mysqli_fetch_assoc($result);
    }
    mysqli_close($link);
    return $list;
}
?>