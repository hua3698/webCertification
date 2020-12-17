<?php
include_once "../base.php";

$acc=$_POST['acc'];

$chk=$Mem->count(['acc'=>$acc]);

if($chk) echo 1; //有註冊紀錄
else echo 0;

?>