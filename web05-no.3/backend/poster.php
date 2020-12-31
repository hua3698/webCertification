<div class="rb tab" style="width: 98%;">
    <h3 class="ct">預告片清單</h3>
    <div style="width: 98%; display:flex;" class="ct">
        <div style="width:25%;margin:0 1px;background:#999">預告片海報</div>
        <div style="width:25%;margin:0 1px;background:#999">預告片片名</div>
        <div style="width:25%;margin:0 1px;background:#999">預告片排序</div>
        <div style="width:25%;margin:0 1px;background:#999">操作</div>
    </div>
    <div style="width: 98%; height:200px;overflow:auto" id="posterList">
        
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
            // location.reload()
            $.get('api/poster_list.php',function(list){
                $("#postList").html(list)
            })
        })
    }

    $.get('api/poster_list.php',function(list){
        // console.log(list)
        $("#postList").html(list)
    })
</script>