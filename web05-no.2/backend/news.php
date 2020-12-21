<form action="api/editnews.php" method="post">
    <table class="ct" style="width:80%;margin:5% auto;">
        <tr>
            <td style="width:20">編號</td>
            <td style="width:40;">標題</td>
            <td style="width:20">顯示</td>
            <td style="width:20">刪除</td>
        </tr>
        <?php
        //分頁
        $count=$News->count();
        $div=3;
        $pages=ceil($count/$div);
        $now=(isset($_GET['p']))?$_GET['p']:1;
        $start=($now-1)*$div;
        
        $all=$News->all(" limit $start,$div");
        foreach ($all as $key => $news) {
        ?>
            <tr>
                <td><?= $start+$key+1; ?>.</td>
                <td><?= $news['title']; ?></td>
                <td><input type="checkbox" name="sh[]" value="<?= $news['id']; ?>" <?=($news['sh']=='1')?"checked":"";?>></td>
                <td><input type="checkbox" name="del[]" value="<?= $news['id']; ?>"></td>
                <td><input type="hidden" name="id[]" value="<?=$news['id'];?>"></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct" style="margin: 5% 0;">
        <?php
        if($now>1){
            echo "<a href='backend.php?do=news&p=".($now-1). "'>&lt;</a>";
        }
        for($i=1;$i<=$pages;$i++){
            $fontSize=($i==$now)?"28px":"18px";
            echo "<a href='backend.php?do=news&p=$i' style='margin:0 5px;font-size:$fontSize;'>$i</a>";
        }
        if($now<$pages){
            echo "<a href='backend.php?do=news&p=".($now+1). "'>&gt;</a>";
        }
        ?>
    </div>
    <div class="ct"><input type="submit" value="確定修改"></div>
</form>