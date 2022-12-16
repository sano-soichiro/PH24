<?php
function get_data($result){

   $data = [];
   $value = mysqli_fetch_assoc($result);
   $flag = 0;

   //配列に変換し格納
   while($value !== false){
      $flag = 1;
      $data[] = $value;
      $value = mysqli_fetch_assoc($result);
   }

   //件数が０でない場合、データを返す
   if($flag == 0){
      return false;
   }
   elseif($flag == 1){
      return $data;
   }
}

//----------------------------------------------
//●インサート文を生成する
//----------------------------------------------

function create_insert_sql($table,$colomn,$data){
   $sql = "INSERT INTO ".$table;
   $sql .= " (".$colomn[0];
   for($i=1;$i<count($colomn);$i++){
      $sql .= ','.$colomn[$i];
   }
   $sql .= ") VALUES ";
   if(array_depth($data) == 1){
      $sql .= "(".single_quote($data[0]);
      for($i=1;$i<count($data);$i++){
         $sql .= ','.single_quote($data[$i]);
      }
      $sql .= ");";
   }
   elseif(array_depth($data) == 2){

      $sql .= "(".single_quote($data[0][0]);
      for($i=1;$i<count($data[0]);$i++){
         $sql .= ','.single_quote($data[0][$i]);
      }
      $sql .= ")";

      for($i=1;$i<count($data);$i++){
         $sql .= ",(".single_quote($data[$i][0]);
         for($j=1;$j<count($data[$i]);$j++){
            $sql .= ','.single_quote($data[$i][$j]);
         }
         $sql .= ")";
      }
      $sql .= ";";
   }
   else{
      return false;
   }

   return $sql;
}

//----------------------------------------------
//●アップデート文を生成する
//----------------------------------------------

function create_update_sql($table,$colomn,$data,$conditions){
   $sql = "UPDATE ".$table;
   $sql .= " SET ".$colomn[0]." = ".single_quote($data[0])." ";
   for($i=1;$i<count($colomn);$i++){
      $sql .= ",".$colomn[$i]." = ".single_quote($data[$i]);
   }
   $sql .= " WHERE ".$conditions.";";
   return $sql;
}

//-----------------------------------------------
//●ANDによる絞り込み検索からセレクト文を作成する
//第一引数…テーブル名
//第二引数…[カラム名,演算子,値]を格納した２次元配列
//第三引数…取り出すカラムを格納した１次元配列
//-----------------------------------------------

function create_select_sql($table,$conditions,$select = ['*']){
   $sql = 'SELECT';
   foreach($select as $key => $value){
      if($key > 0){
         $sql .= ',';
      }
      $sql .= ' '.$value.' ';
   }
   $sql .= ' FROM '.$table.' WHERE';
   foreach($conditions as $key => $value){
      if($key > 0){
         $sql .= 'AND';
      }
      $sql .= ' ';
      foreach($value as $key => $values){
         if($key == 2){
            $sql .= single_quote($values).' ';  
         }
         else{
            $sql .= $values.' ';  
         }
      }
   }
   //$sql .= ';';
   return $sql;
}

//-----------------------------------------------
//●SQL文にORDER BY句を付ける
//-----------------------------------------------



?>