<?php 
include_once "../base.php";
print_r($_POST);

if(!empty($_FILES['trailer']['tmp_name'])){
    $_POST['trailer']=$_FILES['trailer']['name'];
    move_uploaded_file($_FILES['trailer']['tmp_name'],'../img/'.$_FILES['trailer']['name']);
}

if(!empty($_FILES['poster']['tmp_name'])){
    $_POST['poster']=$_FILES['poster']['name'];
    move_uploaded_file($_FILES['poster']['tmp_name'],'../img/'.$_FILES['poster']['name']);
}

$_POST['ondate']=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
$_POST['sh']=1;
$_POST['rank']=$Movie->q("select max(rank) from movie")[0][0]+1;

$Movie->save($_POST);

// 檔案資料庫欄位要設為允許空值
to("../backend.php?do=movie");
?>