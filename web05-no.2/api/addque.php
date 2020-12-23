<?php
include_once "../base.php";

//"問卷名稱"跟"選項"內容都會存進text，差別在問卷名稱的subject是0，選項的subject是問卷名稱的id
$subject=$_POST['subject'];

//先存題目
$Que->save(['text'=>$subject,'subject'=>0,'count'=>0]);

//撈題目的id
$main=$Que->find(['text'=>$subject]);

//選項subject會是題目的id
foreach($_POST['option'] as $option){
    $Que->save(['text'=>$option,'subject'=>$main['id'],'count'=>0]);

}

to("../backend.php?do=que");

?>