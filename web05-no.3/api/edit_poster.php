<?php 
include_once "../base.php";
print_r($_POST['name']); 


foreach($_POST['id'] as $key => $id){
    if(isset($_POST['del']) && in_array($id,$_POST['del'])) $Poster->del($id);
    else{
        $poster=$Poster->find($id);
        $poster['name']=$_POST['name'][$key];
        $poster['ani']=$_POST['ani'][$key];
        $poster['sh']=in_array($id,$_POST['sh'])?1:0;
        $Poster->save($poster);
    }
}

//checkbox radio 有被選中才會被送出資料，所以可能key值不會對應到該筆id的資料

to("../backend.php?do=poster");
?>