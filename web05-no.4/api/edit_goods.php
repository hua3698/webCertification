<?php
include_once "../base.php";

if(!empty($_FILES['img']['tmp_name'])){
    $_POST['img']=$_FILES['img'][''];
}else{
    $good=$Goods->find($_POST['id']);
    $_POST['img']=$good['img'];
}

$Goods->save($_POST);
to("../backend.php?do=th");
?>