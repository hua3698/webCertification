<fieldset>
    <legend>帳號管理</legend>
    <form action="api/deladmin.php" method="POST">
        <table class="ct" style="width: 50%; margin:0 auto;">
            <tr class="clo">
                <td class="width:33.3%">帳號</td>
                <td class="width:33.3%">密碼</td>
                <td class="width:33.3%">刪除</td>
            </tr>
            <?php
            $mems = $Mem->all();
            foreach ($mems as $mem) {
                if ($mem['acc'] != 'admin') {

            ?>
                    <tr>
                        <td><?= $mem['acc']; ?></td>
                        <!-- 密碼改成***，用repeat比replace更符合 -->
                        <td><?= str_repeat("*",strlen($mem['pw'])); //輸出，次數 ?></td>
                        <td><input type="checkbox" name="del[]" value="<?= $mem['id']; ?>"></td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
        <div class="cent ct">
            <input type="submit" value="確定刪除">
            <input type="reset" value="清空選取">
        </div>
    </form>
</fieldset>

<h1>新增會員</h1>
<fieldset>
    <legend>會員註冊</legend>
    <form>
        <div style="color:red">請設定您要註冊的帳號及密碼(最常12個字元)</div>
        <table>
            <tr>
                <td>Step1:登入帳號</td>
                <td><input type="text" name="acc" id="acc"></td>
            </tr>
            <tr>
                <td>Step2:登入密碼</td>
                <td><input type="password" name="pw" id="pw"></td>
            </tr>
            <tr>
                <td>Step3:再次確認密碼</td>
                <td><input type="password" name="pw2" id="pw2"></td>
            </tr>
            <tr>
                <td>Step4:信箱(忘記密碼時使用)</td>
                <td><input type="text" name="email" id="email"></td>
            </tr>
            <tr>
                <td><input type="button" value="註冊" onclick="reg()"><input type="reset" value="清除" id=""></td>
                <td></td>
            </tr>
        </table>
</fieldset>
</form>

<script>
    function reg() {
        let acc = $("#acc").val()
        let pw = $("#pw").val()
        let pw2 = $("#pw2").val()
        let email = $("#email").val()

        //檢查順序：有沒有欄位空白>pw有無等於pw2>帳號是否重複
        if (acc == "" || pw == "" || pw2 == "" || email == "") {
            alert("不可空白")
        } else if (pw != pw2) {
            alert("密碼不同")
        } else {
            $.post("api/chkAcc.php", {
                acc
            }, function(res) {
                if (res == '1') alert("帳號重複")
                else {
                    $.post("api/reg.php", {
                        acc,
                        pw,
                        email
                    }, function() {
                        location.reload()
                    })
                }
            })
        }
    }
</script>