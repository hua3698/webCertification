<?php
include_once "../base.php";
// print_r($_POST);
foreach ($_POST['id'] as $id) {
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        $News->del($id);
    }else{
        $news=$News->find($id);
        $news['sh']=(isset($_POST['sh'])&& in_array($id,$_POST['sh']))?1:0;
        $News->save($news);
    }
}

// if(isset($_POST['sh'])){
//     $all=$News->all();
//     foreach ($all as $news) {
//         $news['sh']=in_array($news['id'],$_POST['sh'])?1:0; //

//         $News->save($news);
//     }
// }

// if(isset($_POST['del'])){
//     foreach ($_POST['del'] as $id) {
//         $News->del($id);
//     }
// }

to("../backend.php?do=news");
?>