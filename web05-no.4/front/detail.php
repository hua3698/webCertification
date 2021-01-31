<?php
$good = $Goods->find($_GET['id']);

?>
<style>
    .pp {
        margin: 5px 3px;
        padding: 5px;
    }
</style>
<h2 class="ct"><?= $good['name']; ?></h2>
<div style="display:flex;">
    <div style="width:70%;" class="pp">
        <img src="img/<?= $good['img']; ?>" style="width:100%;padding:50px 0;">
    </div>
    <div>
        <div class="pp ct"><?= $good['name']; ?></div>
        <div class="pp">分類：<?= $Type->find($good['big'])['name'];?>><?=$Type->find($good['mid'])['name'];?></div>
        <div class="pp">編號：<?= $good['num']; ?></div>
        <div class="pp">價格：<?= $good['price']; ?></div>
        <div class="pp">簡介：<?= $good['intro']; ?></div>
        <div class="pp">庫存量：<?= $good['quota']; ?></div>
    </div>
</div>
<div class="tt ct">
    <form action="?do=buycart&id=<?= $good['id']; ?>" method="get">
        購買數量：<input type="number" name="qt" id="">
        <input type="hidden" name="do" value="buycart">
        <input type="hidden" name="id" value="<?=$g['id'];?>">
        <input type="submit" value="" style="background: url('img/0402.jpg');width:60px;height:20px">
    </form>
</div>