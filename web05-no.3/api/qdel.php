<?php
include_once "../base.php";
$type=$_POST['type'];
$v=$_POST['v'];

$Order->del([$type=>$value]);
?>