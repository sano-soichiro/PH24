<?php 
//----------------------------------------------------
//●データベース処理
//----------------------------------------------------
//初期化
$data = [];
//データベースに接続する
$link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
//接続がうまくいかなかった
if(!$link){
    header('location:./error.php?errorcode=D01');
    exit;
}
//文字設定
mysqli_set_charset($link,'utf8');
//SQL文の実行
$result = mysqli_query($link,$sql);

//IDを取得（INSERT文を実行した場合のみ）
if(strpos($sql,"INSERT INTO") === 0){
    $id = mysqli_insert_id($link);
}
//フェッチ処理（SELECT文を実行した場合のみ）
if(strpos($sql,"SELECT") === 0){
    $value = mysqli_fetch_assoc($result);
    while(!is_null($value)){
        $data[] = $value;
        $value = mysqli_fetch_assoc($result);
    }
    $data_counts = count($data);
}

//データベースから切断
mysqli_close($link);

//実行結果の成功、失敗によって画面遷移を選択
if(!$result){
    echo $sql;
}
else{
    //完了画面へ遷移
    header('location:./tpl/complete.php');
    exit;
}
?>