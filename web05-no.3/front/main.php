<style>
    .poster {
        width: 200px;
        height: 260px;
        margin: auto;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .poster>div {
        /* 大於符號指只繼承第一層 */
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .poster img {
        width: 100%;
    }

    .buttons {
        display: flex;
        width: 400px;
        overflow: hidden;
        margin: 0 auto;

    }

    .list {
        /* width: 320px; */
        display: flex;
        width: 320px;
        overflow: hidden;

    }

    .buttons .btn {
        width: 80px;
        height: 100px;
        text-align: center;
        flex: 0 0 80px;
        position: relative;
        font-size: 12px;

    }

    .btn img {
        width: 70px;
    }

    .arrow {
        width: 0;
        height: 0;
        border-top: 20px solid transparent;
        border-bottom: 20px solid transparent;
        margin: auto;
    }

    .left {
        border-right: 20px solid red;
    }

    .right {
        border-left: 20px solid red;
    }
</style>
<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div class="poster">
            <?php
            $ps = $Poster->all(['sh' => 1], " order by rank");
            foreach ($ps as $key => $p) {
                echo "<div class='po' id='p{$key}' data-ani='{$p['ani']}'>";
                echo "<img src='img/{$p['img']}'>";
                echo "<span>{$p['name']}</span>";
                echo "</div>";
            }
            ?>
        </div>
        <div class="buttons">
            <div class="arrow left"></div>
            <div class="list">
                <?php
                foreach ($ps as $key => $p) {
                    echo "<div class='btn' id='b{$key}' data-ani='{$p['ani']}'>";
                    echo "<img src='img/{$p['img']}'>";
                    echo "<span style='display:block'>{$p['name']}</span>";
                    echo "</div>";
                }
                ?>
            </div>
            <div class="arrow right"></div>
        </div>
    </div>
</div>
<script>
    let p = 0;
    let pos = $(".po").length;

    $(".arrow").on("click", function() {
        if ($(this).hasClass('right')) {
            if ((p + 1) <= (pos - 4)) {
                p++
            }
        } else {
            if ((p - 1) >= (0)) {
                p--
            }
        }
        $(".btn").animate({
            right: p * 80
        })

        // $(".btn").hide();
        // for($i=p;$i<p+4;$i++){
        // $('#b'+i).show()
        // }
    })


    $(".po").hide();
    $("#p0").show();
    let t = setInterval('ani()', 2000);

    function ani(next) {
        let now = $(".po:visible")
        let ani = $(now).data('ani')
        if (next == undefined) {
            if ($(now).next().length) {
                next = $(now).next()
            } else {

                //如果沒有下一張海報,則取得第一張海報
                next = $("#p0")
            }
        }
        // console.log(typeof(ani))
        switch (ani) {
            case 1: //淡入淡出
                $(now).fadeOut(1000)
                $(next).fadeIn(1000)
                break;
            case 2: //滑入滑出
                $(now).slideUp(1000, function() {
                    $(next).slideDown(1000)
                })
                break;
            case 3: //縮放
                $(now).hide(1000)
                $(next).show(1000)
                break;
                case 4: //滑入滑出
                    $(now).animate({left:-200},1000,function(){
                        $(this).hide()
                        $(this).css({left:0})
                    })
                    $(next).css({left:200})
                    $(next).show()
                    $(next).animate({left:0},1000)
                    break;
                case 5:  //中心點縮放
                    $(next).css({width:0,height:0,top:130,left:100});
                    $(now).animate({width:0,height:0,top:130,left:100},function(){
                        $(next).show()
                        $(next).animate({width:200,height:260,top:0,left:0})
                    })
                break;

        }
    }

    //按鈕事件，切換海報並有轉場效果
    $(".btn").on("click", function() {
        let id = $(this).attr('id').replace('b', 'p');
        ani($("#" + id));
    })

    $(".list").hover( //hover可以放兩個function，mouseover & mouseout
        function() {
            clearInterval(t)
        },
        function() {
            t = setInterval(ani(), 5000)
        }
    )
</script>
<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;display:flex;flex-wrap:wrap">
        <?php
        $today = date("Y-m-d");
        $startdate = date("Y-m-d", strtotime("-2days", strtotime($today)));
        //分頁
        $total = $Movie->count(['sh' => 1], " && `ondate` between '$startdate' and '$today'");
        $div = 4;
        $pages = ceil($total / $div);
        $now = (isset($_GET['p'])) ? $_GET['p'] : '1';
        $start = ($now - 1) * $div;

        $movies = $Movie->all(['sh' => 1], " && `ondate` >='$startdate' && `ondate`<='$today' order by rank limit $start,$div");
        // $movies = $Movie->all(['sh' => 1], " && `ondate` between '$startdate' and '$today' order by rank"); //between 小日期 and 大日期
        foreach ($movies as $mo) {
        ?>
            <div style="width: 48%;border:1px solid #ccc;margin:0.5%">
                <div>片名：<?= $mo['name']; ?></div>
                <div style="display: flex;">
                    <a href="javascript:location.href='index.php?do=intro&id=<?= $mo['id']; ?>'">
                        <img src="img/<?= $mo['poster']; ?>" style="width:80px;height:100px">
                    </a>
                    <div>分級：<img src="icon/<?= $mo['level']; ?>.png" alt=""><?= $mo['level']; ?><br>
                        上映日期：<?= $mo['year']; ?>-<?= $mo['month']; ?>-<?= $mo['day']; ?></div>
                </div>
                <div>
                    <button onclick="javascript:location.href='index.php?do=intro&id=<?= $mo['id']; ?>'">劇情簡介</button>
                    <button onclick="javascript:location.href='index.php?do=order&id=<?= $mo['id']; ?>'">線上訂票</button>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="ct">
        <?php
        if ($now > 1) echo "<a href='?p=" . ($now - 1) . "'><</a>";
        for ($i = 1; $i <= $pages; $i++) {
            echo "<a href='?p=$i'>$i</a>";
        }
        if ($now < $pages) echo "<a href='?p=" . ($now + 1) . "'>></a>";
        ?>
    </div>
</div>