<?php
if(!empty($_POST['bottom'])){
    $bot=$Bottom->find(1);
    $bot['bottom']=$_POST['bottom'];
    $Bottom->save($bot);
}
?>
<h2 class="ct">編輯葉偉版權區</h2>
<form action="?do=bot" method="POST">
    <table>
        <tr>
            <td class="tt">頁尾宣告內容</td>
            <td><input type="text" name="bottom" id="bot" value="<?=$Bottom->find(1)['bottom'];?>"></td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="編輯">
        <input type="button" value="重置" onclick="javascript:$('#bot').val('')">
        </div>
</form>