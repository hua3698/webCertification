<?php
$id = $_GET['id'];
$subject = $Que->find($id);
$option = $Que->all(['subject' => $id]);
?>

<fieldset style="width: 80%;margin:auto;">
    <legend>目前位置：首頁 > 問卷調查 > <?= $subject['text']; ?></legend>
    <form action="api/vote.php" method="post">
        <table>
            <tr>
                <td><?= $subject['text']; ?></td>
            </tr>
            <?php
            // print_r($ques);

            foreach ($option as $op) {
            ?>
                <tr>
                    <td><input type="radio" name="vote" value="<?=$op['id'];?>"><?= $op['text']; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <input type="hidden" name="subject" value="<?=$subject['id'];?>">
        <div class="ct"><input type="submit" value="我要投票"></div>
    </form>
</fieldset>