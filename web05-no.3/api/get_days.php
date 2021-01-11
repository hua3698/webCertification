<?php
include_once "../base.php";
$movie=$Movie->find($_GET['movie']);
$today=strtotime(date("Y-m-d"));  //strtotime會把日期轉為秒數
$startDay=strtotime($movie['ondate']);
// echo $startDay;

//印出上映日期+2天以內的日期，如果上映日期小於today則不顯示
for($i=0;$i<3;$i++){
    $showDay=strtotime("+$i days",$startDay);
    if($showDay>=$today){
        echo "<option value='".date("Y-m-d",$showDay)."'>".date("m月d日 l",$showDay)."</option>";
    }
}
?>