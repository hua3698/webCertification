<div class="rb tab" style="width: 98%;">
    <button onclick="javascript:location.href='backend.php?do=add_movie'">新增電影</button>
    <hr>
    <div style="max-height:450px;overflow-y:auto;">
        <?php
        $movies = $Movie->all(" order by rank");
        foreach ($movies as $key => $mo) {
        ?>
            <div style="background:white;color:black;display:flex">
                <div style="width:15%"><img src="img/<?= $mo['poster']; ?>" width="80px"></div>
                <div style="width:15%">分級：<img src="icon/<?= $mo['level']; ?>.png" alt=""></div>
                <div style="width:70%">
                    <div style="display:flex;">
                        <div style="width: 33%;">片名：<?= $mo['name']; ?></div>
                        <div style="width: 33%;">片長：<?= $mo['length']; ?></div>
                        <div style="width: 33%;">上映時間：<?= $mo['year']; ?>-<?= $mo['month']; ?>-<?= $mo['day']; ?></div>
                    </div>
                    <div style="text-align:right">
                    <button onclick="display('movie',<?=$mo['id'];?>)"><?=($mo['sh']=='1')?'顯示':'隱藏';?></button>
                        <?php
                        if ($key != 0) {
                        ?>
                            <button onclick="sw(<?= $mo['id']; ?>,<?= $movies[$key - 1]['id']; ?>)">往上</button>
                        <?php
                        }
                        ?>
                        <?php
                        if ($key != (count($movies) - 1)) { //計算最後一則是第幾個，因為索引值從0開始，所以要減1
                        ?>
                            <button onclick="sw(<?= $mo['id']; ?>,<?= $movies[$key + 1]['id']; ?>)">往下</button>
                        <?php
                        }
                        ?>
                        <button onclick="javascript:location.href='backend.php?do=edit_movie&id=<?= $mo['id']; ?>'">編輯電影</button>
                        <button onclick="del('movie',<?= $mo['id']; ?>)">刪除電影</button>
                    </div>
                    <div><?= $mo['intro']; ?></div>
                </div>
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

    function sw(id1,id2){
        $.post('api/sw.php',{table:'movie',id1,id2},function(re){
            location.reload()
        })
    }

    function display(table,id){
        $.post('api/display.php',{table,id},function(){
            location.reload()
        })
    }
</script>