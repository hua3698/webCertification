<?php
include_once "../base.php";

$goods=$Goods->find($_POST['id']);

switch($_POST['type']){
    case 1:
        $goods['sh']=1;
        break;
        case 2:
            $goods['sh']=0;
        break;
}
$Goods->save($goods);

?>