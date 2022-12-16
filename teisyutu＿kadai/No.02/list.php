<?php
$row = [];
$no_search = '';
$name = '';

// 最初にページを訪れたかそれ以降かの処理
if(isset($_POST['check']) && ($_POST['check'] == 'search' || $_POST['check'] == 'search2')){

    $name = $_POST['name'];

    // 全権表示を押された時の処理
    if($_POST['check'] == 'search2'){
        $name = 'decoy';
    }

    // 検索された時の分岐
    if($name != ''){
        // const呼び出し
        require_once '../../const.php';


        if($_POST['check'] == 'search2'){
            $name = '';
        }

        // DBに接続する
        $link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);

        if($link){
            mysqli_set_charset($link,'utf8');

            $query = "SELECT * FROM sample WHERE name LIKE '%" . $name . "%'";
            $result = mysqli_query($link,$query);

            // 一覧表示部の設定
            $row_data = mysqli_fetch_assoc($result);

            while(!is_null($row_data)){
                $row[] = $row_data;
                $row_data = mysqli_fetch_assoc($result);
            }

            mysqli_close($link);
        }
    }

    // 検索対象がなかった場合の文言の設定
    if(empty($row)){
        $no_search = '検索対象が見つかりませんでした';
    }

}


// modelの呼び出し
require_once './tpl/list.php';

?>