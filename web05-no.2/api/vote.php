<?php
include_once "../base.php";

//主題+1
$subject=$Que->find(['id'=>$_POST['subject']]);
$subject['count']++;
$Que->save($subject);

//選項+1
$option=$Que->find(['id'=>$_POST['vote']]);
$option['count']++;
$Que->save($option);

to("../index.php?do=result&id=".$subject['id']);
?>