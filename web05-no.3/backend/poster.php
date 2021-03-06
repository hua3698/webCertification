<div class="rb tab" style="width: 98%;">
    <h3 class="ct">預告片清單</h3>
    <div style="width: 98%; display:flex;" class="ct">
        <div style="width:25%;margin:0 1px;background:#999">預告片海報</div>
        <div style="width:25%;margin:0 1px;background:#999">預告片片名</div>
        <div style="width:25%;margin:0 1px;background:#999">預告片排序</div>
        <div style="width:25%;margin:0 1px;background:#999">操作</div>
    </div>
    <div style="width: 98%; height:200px;overflow:auto">
        <form action="api/edit_poster.php" method="post">
            <?php
            $poster = $Poster->all(" order by rank ");
            foreach ($poster as $key => $po) {
            ?>
                <div style="width: 100%; display:flex; background:#eee;color:#111;" class="ct">
                    <div style="width:25%;margin:0 1px;">
                        <img src="img/<?= $po['img']; ?>" style="width:80px">
                    </div>
                    <div style="width:25%;margin:0 1px;">
                        <input type="text" name="name[]" value="<?= $po['name']; ?>">
                    </div>
                    <div style="width:25%;margin:0 1px;">
                        <?php
                        if ($key != 0) {
                        ?>
                            <input type="button" value="往上" onclick="sw(<?=$po['id'];?>,<?=$poster[$key-1]['id'];?>)">
                        <?php
                        }
                        ?>
                        <?php
                        if ($key != (count($poster) - 1)) {
                        ?>
                            <input type="button" value="往下" onclick="sw(<?=$po['id'];?>,<?=$poster[$key+1]['id'];?>)">
                        <?php
                        }
                        ?>
                    </div>
                    <div style="width:25%;margin:0 1px;">
                        <input type="checkbox" name="sh[]" value="<?= $po['id']; ?>" <?= ($po['sh'] == 1) ? 'checked' : ''; ?>>顯示
                        <input type="checkbox" name="del[]" value="<?= $po['id']; ?>">刪除
                        <select name="ani[]">
                            <option value="1" <?= ($po['ani'] == 1) ? 'selected' : ''; ?>>淡入淡出</option>
                            <option value="2" <?= ($po['ani'] == 2) ? 'selected' : ''; ?>>滑入滑出</option>
                            <option value="3" <?= ($po['ani'] == 3) ? 'selected' : ''; ?>>縮放</option>
                        </select>
                        <input type="hidden" name="id[]" value="<?= $po['id']; ?>">
                    </div>
                </div>
            <?php
            }
            ?>
    </div>
    <div class="ct">
        <input type="submit" value="編輯確定">
        <input type="reset" value="重置">
    </div>
    </form>

    <hr>
    <h3 class="ct" style="margin:0">新增預告片海報</h3>
    <form action="api/add_poster.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>預告片海報︰</td>
                <td><input type="file" name="poster" id=""></td>
                <td>預告片名：</td>
                <td><input type="text" name="name" id=""></td>
            </tr>
        </table>
        <div class="ct">
            <input type="submit" value="送出">
            <input type="reset" value="重置">
        </div>
    </form>
</div>
<script>
    function sw(id1,id2){
        $.post('api/sw.php',{table:'poster',id1,id2},function(re){
            location.reload()
        })
    }
</script>