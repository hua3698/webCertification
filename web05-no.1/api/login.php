<?php

include_once "../base.php";

$acc=$_POST['acc'];
$pw=$_POST['pw'];

//會用count而不使用find撈資料，是因為安全防護機制
$check=$Admin->count(['acc'=>$acc,'pw'=>$pw]);

if($check>0){
    $_SESSION['login']=$acc;
    to("../backend.php");
}else{
    to("../index.php?do=login&err=1");
}

?>