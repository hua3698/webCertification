<?php
include_once "../base.php";

$id=$_GET['id'];

$news=$News->find(['type'=>$id]);

echo nl2br($news['text']);
?>