<h2 class="ct">管理者管理</h2>
<div class="ct"><button>新增管理者</button></div>

<table class="all">
    <tr class="tt ct">
        <td>帳號</td>
        <td>密碼</td>
        <td>管理</td>
    </tr>
    <?php
    $admins=$Admin->all();
    foreach($admins as $ad){
    ?>
    <tr class="pp">
        <td><?=$ad['acc'];?></td>
        <td><?=str_repeat("*",strlen($ad['pw']));?></td>
        <td>
        <?php
        if($ad['acc']=='admin'){
            echo "此帳號為最高權限";
        }else{
            ?>
            <button onclick="lof('?do=edit_admin&id=<?=$ad['id'];?>')">修改</button>
            <button onclick="del('admin',<?=$ad['id'];?>)">刪除</button>
        </td>
        <?php
        }
        ?>
    </tr>
    <?php
    }
    ?>
</table>