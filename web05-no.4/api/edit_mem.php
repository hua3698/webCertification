<?php
include_once "../base.php";
$Mem->save($_POST);
//因為post過來的資料有帶id，所以會用update存回資料庫


// $mem=$Mem->find($_POST['id']);

// $mem['name']=$_POST['name'];
// $mem['tel']=$_POST['tel'];
// $mem['addr']=$_POST['addr'];
// $mem['email']=$_POST['email'];
to("../backend.php?do=mem");

?>