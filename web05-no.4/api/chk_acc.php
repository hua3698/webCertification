<?php 
include_once "../base.php";
echo $Mem->count(['acc'=>$_GET['acc']]);

// 簡化寫法↑
// $acc=$_GET['acc'];
// $chk=$Mem->count(['acc'=>$acc]);
// return $chk;

?>