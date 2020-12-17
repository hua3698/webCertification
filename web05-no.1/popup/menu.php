<?php include_once "../base.php"; ?>
<h3>新增主選單</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>主選單文字</td>
            <td><input type="text" name="text" id=""></td>
        </tr>
        <tr>
            <td>主選單連結</td>
            <td><input type="text" name="href" id=""></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="hidden" name="table" value="<?=$_GET['table'];?>">
                <input type="submit" value="修改確定">
                <input type="reset" value="重置">
            </td>
        </tr>
    </table>
</form>