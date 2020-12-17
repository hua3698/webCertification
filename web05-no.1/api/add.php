<?php
//新增
include_once "../base.php";
// print_r($_POST);
$table=$_POST['table'];
$db=new DB($table);

$data=[];
if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],'../img/'.$_FILES['img']['name']);
    $data['img']=$_FILES['img']['name'];
}

if(!empty($_POST['text'])){
    $data['text']=$_POST['text'];
}

//如果不是title那張table，show預設都是1，如果是title那張table，預設都是0，因為title只能選一張為1
switch ($table) {
    case 'title':
        $data['sh']=0;
        break;
    case 'admin':
        $data['acc']=$_POST['acc'];
        $data['pw']=$_POST['pw'];
    break;
    case 'menu':
        $data['href']=$_POST['href'];
        $data['sh']=1;
        break;
        
    default:
        $data['sh']=1;
        break;
} 

$db->save($data);

to("../backend.php?do=$table");
