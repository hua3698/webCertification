<?php

if (isset($_GET['big']) && isset($_GET['mid'])) {
    $nav = $Type->find($_GET['big'])['name'] . " > " . $Type->find($_GET['mid'])['name'];
    $good = $Goods->all(['mid' => $_GET['mid'], 'sh' => 1]);
} elseif (isset($_GET['big'])) {
    $nav = $Type->find($_GET['big'])['name'];
    $good = $Goods->all(['big' => $_GET['big'], 'sh' => 1]);
} else {
    $nav = "全部商品";
    $good = $Goods->all(['sh' => 1]);
}
?>
<style>
    .p>div {
        margin: 3px 0;
        padding: 5px;
    }
</style>
<h2><?= $nav; ?></h2>
<?php
foreach ($good as $g) {
?>
    <div style="display:flex;">
        <div style="width:40%;">
            <a href="?do=detail&id=<?=$g['id'];?>"><img src="img/<?= $g['img']; ?>" style="width:100%;"></a>
        </div>
        <div class="p">
            <div class="tt ct"><?= $g['name']; ?></div>
            <div class="pp">價格：<?= $g['price']; ?>
                <a href="?do=buycart&item=<?= $g['id']; ?>&qt=1" style="float:right"><img src="img/0402.jpg"></a>
            </div>
            <div class="pp">規格：<?= $g['spec']; ?></div>
            <div class="pp">規格：<?= mb_substr($g['intro'], 0, 25, 'utf8'); ?></div>
        </div>
    </div>
<?php
}
?>