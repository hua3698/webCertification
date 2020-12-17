<h3>新增管理者帳號</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td style="text-align: right;">帳號：</td>
            <td><input type="text" name="acc" id=""></td>
        </tr>
        <tr>
            <td style="text-align: right;">密碼：</td>
            <td><input type="pw" name="pw" id=""></td>
        </tr>
        <tr>
            <td style="text-align: right;">確認密碼：</td>
            <td><input type="pw" name="pw2" id=""></td>
        </tr>
        <tr>
            <td colspan="3">
                <input type="hidden" name="table" value="<?=$_GET['table'];?>">
                <input type="submit" value="新增">
                <input type="reset" value="重置">
            </td>
        </tr>
    </table>
</form>