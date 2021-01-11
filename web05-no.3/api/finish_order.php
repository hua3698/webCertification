<?php
include_once "../base.php";

$sess = [
    1 => "14:00~16:00",
    2 => "16:00~18:00",
    3 => "18:00~20:00",
    4 => "20:00~22:00",
    5 => "22:00~24:00"
];

$data['movie']=$Movie->find($_POST['movie'])['name'];
$data['date']=$_POST['date'];
sort($_POST['seats']);
$data['seats']=serialize($_POST['seats']); //先排序(sort)再轉成序列化
$data['quantity']=count($_POST['seats']);
$data['session']=$sess[$_POST['session']];
$data['num']=date("Ymd").sprintf("%04d",($Order->q('select max(`id`) from `orders` ')[0][0]+1));  //q出來是二維陣列
// print_r($data);

$Order->save($data);
echo $data['num']; //陣列、物件、圖片都不能存到資料庫，只有數字及文字
?>