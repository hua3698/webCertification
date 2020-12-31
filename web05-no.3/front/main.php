<?php
//分頁

?>
<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
            <ul class="lists">
            </ul>
            <ul class="controls">
            </ul>
        </div>
    </div>
</div>
<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;display:flex;flex-wrap:wrap">
        <?php
        $movies = $Movie->all(['sh' => 1], " order by rank");

        foreach ($movies as $mo) {
            $date = strtotime($mo['year'] - $mo['month'] - $mo['day']);
            $today = strtotime(date("Y-m-d"));

            if ($date <= $today && $date >= strtotime(" -2 days,$today")) {
        ?>
                <div style="width: 48%;border:1px solid #ccc;margin:0.5%">
                    <div>片名：<?=$mo['name'];?></div>
                    <div style="display: flex;">
                        <a href="javascript:location.href='index.php?do=intro&id=<?=$mo['id'];?>'">
                            <img src="img/<?=$mo['poster'];?>" style="width:80px;height:100px">
                        </a>
                        <div>分級：<img src="icon/<?=$mo['level'];?>.png" alt=""><?=$mo['level'];?><br>
                        上映日期：<?=$mo['year'];?>-<?=$mo['month'];?>-<?=$mo['day'];?></div>
                    </div>
                    <div>
                        <button onclick="javascript:location.href='index.php?do=intro&id=<?=$mo['id'];?>'">劇情簡介</button>
                        <button onclick="javascript:location.href='index.php?do=order&id=<?=$mo['id'];?>'">線上訂票</button>
                    </div>
                </div>
        <?php
            }
        }
        ?>
        <div class="ct"> </div>
    </div>
</div>