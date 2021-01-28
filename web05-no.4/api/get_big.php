<?php
include_once "../base.php";
$big=$Type->all(['parent'=>0]);
foreach($big as $b){
    echo "<option value='{$b['id']}'>{$b['name']}</option>";
}

?>