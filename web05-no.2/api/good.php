<?php
include_once "../base.php";

$id=$_POST['id'];
$chk=$Log->count(['news'=>$id,'acc'=>$_SESSION['login']]);

if($chk>0){
    $Log->del([
        'acc'=>$_SESSION['login'],
        'news'=>$id
    ]);
    $news=$News->find($id);
    $news['good']--;
    $News->save($news);

}else{
    $Log->save([
        'acc'=>$_SESSION['login'],
        'news'=>$id
        ]);
        $news=$News->find($id);
        $news['good']++;
        $News->save($news);

}

// switch($_POST['type']){
//     case "1":
//         $Log->save([
//             'acc'=>$_POST['acc'],
//             'news'=>$_POST['news']
//         ]);

//         //從front/pop.php按讚的紀錄寫進資料庫+1
//         $news=$News->find($_POST['news']);
//         $news['good']++;
//         $News->save($news);
//         break;
//     case "2":
//         $Log->del([
//             'acc'=>$_POST['acc'],
//             'news'=>$_POST['news']
//         ]);

//         $news=$News->find($_POST['news']);
//         $news['good']--;
//         $News->save($news);
//         break;
// }


?>