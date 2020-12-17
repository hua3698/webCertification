<?php
include_once "../base.php";

$acc=$_POST['acc'];
$pw=$_POST['pw'];

$chk=$Mem->count(['acc'=>$acc,'pw'=>$pw]);

if($chk) echo 1; //表示帳密正確
else echo 0;

?>