<fieldset>
    <legend>目前位置：首頁 > 人氣文章區</legend>
    <table style="width: 100%;">
        <tr>
            <td width="30%">標題</td>
            <td width="40%">內容</td>
            <td width="15%">人氣</td>
            <td width="15%"></td>
        </tr>
        <?php
        $count = $News->count(['sh' => 1]);
        $div = 5;
        $pages = ceil($count / $div);
        $now = (isset($_GET['p'])) ? $_GET['p'] : 1;
        $start = ($now - 1) * $div;

        $all = $News->all(['sh' => '1'], " order by good desc limit $start,$div");
        foreach ($all as $news) {
        ?>
            <tr>
                <td class="header clo" id="t<?= $news['id']; ?>" style="cursor: pointer;color:blue"><?= $news['title']; ?></td>
                <td>
                    <span class="title"><?= mb_substr($news['title'], 0, 20, 'utf8'); ?></span>
                    <span class="text" style="background:rgba(51,51,51,0.8); color:#FFF; min-height:100px; width:300px; position:absolute; display:none; z-index:9999; overflow:auto;">
                    <h3><?=$typeStr[$news['type']];?></h3>
                    <?= nl2br($news['text']); ?>
                    </span>
                </td>
                <td>
                    <span id="vie<?=$news['id'];?>"><?=$news['good'];?>個人說讚</span><img src="icon/02B03.jpg" style="width:20px">
                </td>
                <td>
                    <?php
                    if (!empty($_SESSION['login'])) {
                        $chk = $Log->count(['acc' => $_SESSION['login'], 'news' => $news['id']]);
                        if ($chk) {//chk有值>>表示已經有按讚紀錄
                    ?>
                            <a href="#" id="news<?= $news['id']; ?>" onclick="good('<?= $news['id']; ?>','<?= $_SESSION['login']; ?>','2')">收回讚</a>
                        <?php
                        } else {
                        ?>
                            <a href="#" id="news<?= $news['id']; ?>" onclick="good('<?= $news['id']; ?>','<?= $_SESSION['login']; ?>','1')">讚</a>
                    <?php
                        }
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct" style="margin: 5% 0;">
        <?php
        if ($now > 1) {
            echo "<a href='index.php?do=pop&p=" . ($now - 1) . "'>&lt;</a>";
        }
        for ($i = 1; $i <= $pages; $i++) {
            $fontSize = ($i == $now) ? "28px" : "18px";
            echo "<a href='index.php?do=pop&p=$i' style='margin:0 5px;font-size:$fontSize;'>$i</a>";
        }
        if ($now < $pages) {
            echo "<a href='index.php?do=pop&p=" . ($now + 1) . "'>&gt;</a>";
        }
        ?>
    </div>
</fieldset>

<script>
    $(".header").hover(function() {
        $(this).next().children('.text').toggle() //next 兄弟層級的下一個元素

        // $(this).next().children('.title').toggle() //toggle 本來是顯示改為隱藏，本來是隱藏則改為顯示

        // $(this).next().children('.title').hide()
        // $(this).next().children('.text').show()
        // let id=$(this).attr("id");  //this指的是當我 onclick點擊 的這個事件，並找到他的id屬性的值

    })

    // let header=document.addEventListener.()
</script>