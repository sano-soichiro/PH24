<?php
// DB全件取得
function sql_get_all_column($link,$table){
    $list = [];
    $query = "SELECT * FROM ".$table;
    $result = mysqli_query($link,$query);
    $row = mysqli_fetch_assoc($result);
    while($row){
        $list[] = $row;
        $row = mysqli_fetch_assoc($result);
    }
    mysqli_close($link);
    return $list;
}

// 配列を指定ページ数に分割
function page_split($list,$split){
    $page = [];
    $bookmark = 0;
    foreach($list as $key => $value){
        if($key % $split == 0 && $key != 0){
            $bookmark = $bookmark + 1;
        }
        $page[$bookmark][] = $value;
    }
    return $page;
}

// ソルトハッシュ
function solt_hash($hash,$solt,$stretch){
    $work = $hash;
    for($i=0;$i<$stretch;$i++){
        $work = md5($solt.$work);
    }
    return $work;
}
?>