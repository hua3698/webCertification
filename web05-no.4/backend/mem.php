<h2 class="ct">會員管理</h2>
<table class="all">
    <tr class="tt ct">
        <td>姓名</td>
        <td>會員帳號</td>
        <td>註冊日期</td>
        <td>操作</td>
    </tr>
    <?php
    $mems=$Mem->all();
    foreach($mems as $m){
    ?>
    <tr class="pp">
        <td><?=$m['name'];?></td>
        <td><?=$m['acc'];?></td>
        <td><?=$m['pw'];?></td>
        <td>
            <button onclick="lof('?do=edit_mem&id=<?=$m['id'];?>')">修改</button>
            <button onclick="del('mem',<?=$m['id'];?>)">刪除</button>
        </td>
    </tr>
    <?php
    }
    ?>
</table>