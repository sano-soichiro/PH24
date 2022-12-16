<?php
$data_list = [
    ['id' => 1 , 'name' => 'ポテトチップス' , 'price' => 100],
    ['id' => 2 , 'name' => 'カール' , 'price' => 80],
    ['id' => 3 , 'name' => 'ポテロング' , 'price' => 120],
    ['id' => 4 , 'name' => 'ポッキー' , 'price' => 140],
    ['id' => 5 , 'name' => 'プリッツ' , 'price' => 100],
];


$list1 = [];
for($i=0;$i<2;$i++){
    $temp_list = [];
    for($j=0;$j<3;$j++){
        $temp_list[] = $i * $j;
    }
    $list1[] = $temp_list;
}

$list2 = [];
foreach($data_list as $data){
    $list2[] = $data['name'];
}

$list3 = [];
foreach($data_list as $key => $data){
    if(1 <= $key && $key <= 3){
        $data['tax_in'] = $data['price'] * 1.1;
        $list3[] = $data;
    }
}

require_once './tmp/index.php';
?>