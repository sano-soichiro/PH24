<?php
class pager {
    private $page_num;
    private $line;
    private $data_array;

    public function __construct($list , $set_line_num , $set_page_num){
        $this->data_array = $list;
        $this->line = $set_line_num;
        $this->page_num = $set_page_num;
    }

    public function get_data(){
        $list = [];
        for($i=0;$i < $this->line;$i++){
            if(!empty($this->data_array[($this->page_num - 1) * $this->line + $i])){
                $list[] = $this->data_array[($this->page_num - 1) * $this->line + $i];
            }
        }
        return $list;
    }

    public function page_list($class = [] , $str = ''){

        $p_num = 1;

        $pager = "";
        if(!empty($class)){
            $ul_class =  $class['ul'];
            $li_class = $class['li']['main'];
            $active_class = $class['li']['active'];
            $disabled_class = $class['li']['disabled'];
            $a_class = "class='" . $class['a'] . "'";
        }

        if(!empty($class)){

            $pager = $pager . "<ul class='" . $ul_class . "'>";

            for($j=0;$j < ceil(count($this->data_array) / $this->line);$j++){
                
                if($p_num == 1){
                    if($this->page_num == 1){
                        $set_num = $this->page_num - 1;
                        $pager = $pager . "<li  class='" . $li_class . " " . $disabled_class . "'><a " . $a_class . " href='" . $str . "?page_num=" . $set_num . "'>前へ</a></li>";
                    }else{
                        $set_num = $this->page_num - 1;
                        $pager = $pager . "<li  class='" . $li_class . "'><a " . $a_class . " href='" . $str . "?page_num=" . $set_num . "'>前へ</a></li>";
                    }
                }

                if($this->page_num == $p_num){
                    $set_num = $p_num;
                    $pager = $pager . "<li  class='" . $li_class . " " . $active_class . "'><a " . $a_class . " href='" . $str . "?page_num=" . $p_num . "'>" . $set_num . "</a></li>";
                }else{
                    $set_num = $p_num;
                    $pager = $pager . "<li  class='" . $li_class . "'><a " . $a_class . " href='" . $str . "?page_num=" . $p_num . "'>" . $set_num . "</a></li>";
                }

                if($p_num == ceil(count($this->data_array) / $this->line)){
                    if($this->page_num == ceil(count($this->data_array) / $this->line)){
                        $set_num = $this->page_num + 1;
                        $pager = $pager . "<li  class='" . $li_class . " " . $disabled_class . "'><a " . $a_class . " href='" . $str . "?page_num=" . $set_num . "'>次へ</a></li>";
                    }else{
                        $set_num = $this->page_num + 1;
                        $pager = $pager . "<li  class='" . $li_class . "'><a " . $a_class . " href='" . $str . "?page_num=" . $set_num . "'>次へ</a></li>";
                    }
                }

                $p_num = $p_num + 1;
            }
            $pager = $pager ."</ul>";
        }else{
            $pager = $pager . "<ul>";

            foreach($this->get_data() as $key => $value){
                
                if($p_num == 0){
                    if($this->page_num == 0){
                        $set_num = $this->page_num - 1;
                        $pager = $pager . "<li><a href='" . $str . "?page_num=" . $set_num . "'>前へ</a></li>";
                    }else{
                        $set_num = $this->page_num - 1;
                        $pager = $pager . "<li><a href='" . $str . "?page_num=" . $set_num . "'>前へ</a></li>";
                    }
                }

                if($this->page_num == $p_num){
                    $set_num = $p_num + 1;
                    $pager = $pager . "<li'><a href='" . $str . "?page_num=" . $p_num . "'>" . $set_num . "</a></li>";
                }else{
                    $set_num = $p_num + 1;
                    $pager = $pager . "<li'><a href='" . $str . "?page_num=" . $p_num . "'>" . $set_num . "</a></li>";
                }

                if($p_num + 1 == ceil(count($this->data_array) / $this->line)){
                    if($this->page_num + 1 == ceil(count($this->data_array) / $this->line)){
                        $set_num = $p_num + 1;
                        $pager = $pager . "<li'><a href='" . $str . "?page_num=" . $set_num . "'>次へ</a></li>";
                    }else{
                        $set_num = $p_num + 1;
                        $pager = $pager . "<li'><a href='" . $str . "?page_num=" . $set_num . "'>次へ</a></li>";
                    }
                }

                $p_num = $p_num + 1;
            }
            $pager = $pager ."</ul>";
        }
        echo $pager;
    }

    public function page_place(){
        if($this->page_num == 1){
            $pager = 
            "
            <ul>
                <li><a href='?page_num" . $this->page_num - 1 . "'>前へ</a></li>
                <li><a href='?page_num" . $this->page_num . "'>" . $this->page_num . "</a></li>
                <li><a href='?page_num" . $this->page_num + 1 . "'>" . $this->page_num + 1 . "</a></li>
                <li><a href='?page_num" . $this->page_num + 2 . "'>" . $this->page_num + 2 . "</a></li>
                <li><a href='?page_num" . $this->page_num + 3 . "'>" . $this->page_num + 3 . "</a></li>
                <li><a href='?page_num" . $this->page_num + 4 . "'>" . $this->page_num + 4 . "</a></li>
                <li><a href='?page_num" . $this->page_num + 1 . "'>次へ</a></li>
            </ul>
            ";
        }elseif($this->page_num == 2){
            $pager = 
            "
            <ul>
                <li><a href='?page_num" . $this->page_num - 1 . "'>前へ</a></li>
                <li><a href='?page_num" . $this->page_num - 1 . "'>" . $this->page_num - 1 . "</a></li>
                <li><a href='?page_num" . $this->page_num . "'>" . $this->page_num . "</a></li>
                <li><a href='?page_num" . $this->page_num + 1 . "'>" . $this->page_num + 1 . "</a></li>
                <li><a href='?page_num" . $this->page_num + 2 . "'>" . $this->page_num + 2 . "</a></li>
                <li><a href='?page_num" . $this->page_num + 3 . "'>" . $this->page_num + 3 . "</a></li>
                <li><a href='?page_num" . $this->page_num + 1 . "'>次へ</a></li>
            </ul>
            ";
        }elseif($this->page_num == count($this->data_array)){
            $pager = 
            "
            <ul>
                <li><a href='?page_num" . $this->page_num - 1 . "'>前へ</a></li>
                <li><a href='?page_num" . $this->page_num - 4 . "'>" . $this->page_num - 4 . "</a></li>
                <li><a href='?page_num" . $this->page_num - 3 . "'>" . $this->page_num - 3 . "</a></li>
                <li><a href='?page_num" . $this->page_num - 2 . "'>" . $this->page_num - 2 . "</a></li>
                <li><a href='?page_num" . $this->page_num - 1 . "'>" . $this->page_num - 1 . "</a></li>
                <li><a href='?page_num" . $this->page_num . "'>" . $this->page_num . "</a></li>
                <li><a href='?page_num" . $this->page_num + 1 . "'>次へ</a></li>
            </ul>
            ";
        }elseif($this->page_num == count($this->data_array) - 1){
            $pager = 
            "
            <ul>
                <li><a href='?page_num" . $this->page_num - 1 . "'>前へ</a></li>
                <li><a href='?page_num" . $this->page_num - 3 . "'>" . $this->page_num - 3 . "</a></li>
                <li><a href='?page_num" . $this->page_num - 2 . "'>" . $this->page_num - 2 . "</a></li>
                <li><a href='?page_num" . $this->page_num - 1 . "'>" . $this->page_num - 1 . "</a></li>
                <li><a href='?page_num" . $this->page_num . "'>" . $this->page_num . "</a></li>
                <li><a href='?page_num" . $this->page_num + 1 . "'>" . $this->page_num + 1 . "</a></li>
                <li><a href='?page_num" . $this->page_num + 1 . "'>次へ</a></li>
            </ul>
            ";
        }else{
            $pager = 
            "
            <ul>
                <li><a href='?page_num" . $this->page_num - 1 . "'>前へ</a></li>
                <li><a href='?page_num" . $this->page_num - 2 . "'>" . $this->page_num - 2 . "</a></li>
                <li><a href='?page_num" . $this->page_num - 1 . "'>" . $this->page_num - 1 . "</a></li>
                <li><a href='?page_num" . $this->page_num . "'>" . $this->page_num . "</a></li>
                <li><a href='?page_num" . $this->page_num + 1 . "'>" . $this->page_num + 1 . "</a></li>
                <li><a href='?page_num" . $this->page_num + 2 . "'>" . $this->page_num + 2 . "</a></li>
                <li><a href='?page_num" . $this->page_num + 1 . "'>次へ</a></li>
            </ul>
            ";
        }
        return $pager;
    }
}
?>