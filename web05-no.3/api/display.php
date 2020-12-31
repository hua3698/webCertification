<?php 
include_once "../base.php";

$db=new DB($_POST['table']);
$row=$db->find($_POST['id']);

//0跟1切換的方式
// $row['sh']=($row['sh']+1)%2;
$row['sh']=!$row['sh']; 

$db->save($row);
?>