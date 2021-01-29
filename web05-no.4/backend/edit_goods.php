<?php
$g=$Goods->find($_GET['id']);
?>

<h2 class="ct">修改商品</h2>
<form action="api/edit_goods.php" method="post" enctype="multipart/form-data">
    <table class="all">
<tr>
    <td class="tt">所屬大分類</td>
    <td class="pp"><select name="big" id="big" onchange="getMid()"></select></td>
</tr>
<tr>
    <td class="tt">所屬中分類</td>
    <td class="pp"><select name="mid" id="mid"></select></td>
</tr>
<tr>
    <td class="tt">商品編號</td>
    <td class="pp"><?=$g['num'];?></td>
</tr>
<tr>
    <td class="tt">商品名稱</td>
    <td class="pp"><input type="text" name="name" value="<?=$g['name'];?>"></td>
</tr>
<tr>
    <td class="tt">商品價格</td>
    <td class="pp"><input type="text" name="price" value="<?=$g['price'];?>"></td>
</tr>
<tr>
    <td class="tt">規格</td>
    <td class="pp"><input type="text" name="spec" value="<?=$g['spec'];?>"></td>
</tr>
<tr>
    <td class="tt">庫存量</td>
    <td class="pp"><input type="number" name="quota" value="<?=$g['quota'];?>"></td>
</tr>
<tr>
    <td class="tt">商品圖片</td>
    <td class="pp"><input type="file" name="img"></td>
</tr>
<tr>
    <td class="tt">商品介紹</td>
    <td class="pp"><textarea name="intro" style="width: 90%;height:200px"><?=$g['intro'];?></textarea></td>
</tr>
    </table>
    <div class="ct">
    <input type="hidden" name="id" value="<?=$g['id']?>">
    <input type="submit" value="修改">
    <input type="reset" value="重置">
    <input type="button" value="返回" onclick="location.history(-1)">
    </div>
</form>


<script>
getBig();

function getBig(){
    $.get("api/get_big.php",function(big){
        $("#big").html(big)
        $("#big option[value='<?=$g['id'];?>'").prop('selected',true);
        getMid();
    })
}

function getMid(){
    $.get("api/get_mid.php",{bigId:$("#big").val()},function(mid){
        $("#mid").html(mid);
        $("#mid option[value='<?=$g['mid'];?>']").prop('selected',true);
    })
}
</script>