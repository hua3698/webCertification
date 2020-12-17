<?php
// 修改
include "../base.php";
$table=$_POST['table'];
$db=new DB($table);
print_r($_POST);

foreach($_POST['id'] as $key => $id){
    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
        $db->del($id);
    }else{
        $row=$db->find($id);

    switch ($table) {
        case 'title':
        $row['sh']=($id==$_POST['sh'])?1:0;
        break;
        case 'total':
            $row['total']=$_POST['total'];
        break;
        case 'bottom':
            $row['bottom']=$_POST['bottom'];
        break;
        case 'admin':
            $row['acc']=$_POST['acc'][$key];
            $row['pw']=$_POST['pw'][$key];
        break;
        case 'menu':
            $row['sh']=in_array($id,$_POST['sh'])?1:0;  //判斷當筆id是否在sh[]陣列內
            $row['href']=$_POST['href'][$key];
        break;
        default:
        $row['sh']=in_array($id,$_POST['sh'])?1:0;  //判斷當筆id是否在sh[]陣列內
        break;
        
    }
    
    if(!empty($_POST['text'])) $row['text']=$_POST['text'][$key];

    $db->save($row);
    }

}
to("../backend.php?do=$table");
