<?php
include_once "../base.php";

$mid=$Type->all(['parent'=>$_GET['bigId']]);
foreach($mid as $m){
    echo "<option value='{$m['id']}'>{$m['name']}</option>";
}
?>