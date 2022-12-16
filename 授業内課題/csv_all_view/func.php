<?php
function get_data($file_pass){
    //ファイルが存在しなければfalseを返す
    if(file_exists($file_pass) === false){
        return false;
    }else{
    //ファイルの読み取り
        $csv_list = [];
        $fp = fopen($file_pass,'r');
        while($csv = fgets($fp)){
            $csv_list[] = explode(',',$csv);
        }
        fclose($fp);
    //読み取ったのち中身が0件ならfalseを返す
        if(count($csv_list) == 0){
            return false;
        }else{
    //allokなら配列を返す
            return $csv_list;
        }
    }
}
?>