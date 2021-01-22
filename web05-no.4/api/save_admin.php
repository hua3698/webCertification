<?php
include_once "../base.php";
//資料庫不能直接存陣列/物件，可以先轉成序列化
$_POST['pr']=serialize($_POST['pr']);
$Admin->save($_POST);
to("../backend.php?do=main");
?>