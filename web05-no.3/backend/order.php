<style>
    .ord_header,
    .ord_item {
        display: flex;
    }

    .ord_header div,
    .ord_item div {
        width: 14.7%;
        padding: 3px;
        background: #999;
        text-align: center;
        color: black;
    }

    .ord_item div {
        background: #ccc;
        border-bottom: 1px solid;
    }

    .ord_list {
        height: 420px;
        overflow: auto;
        width: 100%;
    }
</style>
<div class="rb tab" style="width: 98%;">
    <h2 class="ct">訂單管理</h2>
    <div class="q_del">
        快速刪除：
        <input type="radio" name="type" value="date" checked>依日期
        <input type="date" name="date" id="date">
        <input type="radio" name="type" value="movie">依電影
        <select name="movie" id="movie">
            <?php
            $movies = $Movie->q("select `movie` from `orders` group by `movie`");
            foreach ($movies as $mo) {
                echo "<option value='{$mo['movie']}'>{$mo['movie']}</option>";
            }
            ?>
        </select>
        <button onclick="qDel()">刪除</button>
    </div>
    <div class="ord_header">
        <div>訂單編號</div>
        <div>電影名稱</div>
        <div>日期</div>
        <div>場次時間</div>
        <div>訂購數量</div>
        <div>訂購位置</div>
        <div>操作</div>
    </div>
    <div class="ord_list">
        <?php
        $orders = $Order->all(" order by num desc ");
        foreach ($orders as $or) {
        ?>
            <div class="ord_item">
                <div><?= $or['num']; ?></div>
                <div><?= $or['movie']; ?></div>
                <div><?= $or['date']; ?></div>
                <div><?= $or['session']; ?></div>
                <div><?= $or['quantity']; ?></div>
                <div>
                    <?php
                    // $or['seats'];
                    $seats = unserialize($or['seats']);
                    foreach ($seats as $seat) {
                        echo (floor($seat / 5) + 1) . "排" . ($seat % 5 + 1) . "號<br>";
                    }
                    ?>
                </div>
                <div><button onclick="del('orders',<?= $or['id']; ?>)">刪除</button></div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<script>
    function del(table, id) {
        $.post('api/del.php', {
            table,
            id
        }, function() {
            location.reload()
        })
    }

    function qDel() {
        let v,type=$("input[type='radio']:checked").val();
        switch (type) {
            case 'date':
                v = $("#date").val();
                break;
            case 'movie':
                v = $("#movie").val();
                break;
        }
        // console.log(v,type)
        let con=confirm('你確定要刪除所有'+value+'的訂單嗎?')
        if(con){
            $.post("api/qdel.php",{v,type},function(){
                location.reload()
            })
        }

    }
</script>