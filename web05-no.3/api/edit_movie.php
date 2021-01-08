<?php 
include_once "../base.php";
print_r($_POST);

$movie=$Movie->find($_POST['id']);


if(!empty($_FILES['trailer']['tmp_name'])){
    $_POST['trailer']=$_FILES['trailer']['name'];
    move_uploaded_file($_FILES['trailer']['tmp_name'],'../img/'.$_FILES['trailer']['name']);
}

if(!empty($_FILES['poster']['tmp_name'])){
    $_POST['poster']=$_FILES['poster']['name'];
    move_uploaded_file($_FILES['poster']['tmp_name'],'../img/'.$_FILES['poster']['name']);
}

$_POST['ondate']=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
foreach ($movie as $key => $value) {
    if(isset($_POST[$key])){
        if($value!=$_POST[$key]){
            $movie[$key]=$_POST[$key];
        }
    }
}
// echo $_POST['ondate'];
// $_POST['sh']=1;
// $data['rank']=$Movie->q("select max(rank) from movie")[0][0]+1;

$Movie->save($movie);

to("../backend.php?do=movie");
// 檔案資料庫欄位要設為允許空值
?>