<?php
$id=$_GET['id'];
$subject=$Que->find($id);
$option=$Que->all(['subject'=>$id]);
?>

<fieldset style="width: 80%;margin:auto;">
    <legend>目前位置：首頁 > 問卷調查 > <?= $subject['text']; ?></legend>
    <h3><?= $subject['text']; ?></h3>
        <table>
            <?php
            // print_r($ques);

            foreach ($option as $key => $op) {
                $div=($subject['count']!=0)?$subject['count']:1;
                $rate=$op['count']/$div;
            ?>
                <tr>
                    <td width="60%">
                        <?=$key+1;?>.  <!-- 編號 -->
                        <?=$op['text'];?>
                    </td>
                    <td>
                        <div style="display: inline-block;height:25px;background:#999;width:<?=100*$rate;?>%"></div>
                        <?=$op['count'];?>票(<?=round(($rate*100),2);?>%)
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <input type="hidden" name="subject" value="<?=$subject['id'];?>">
        <div class="ct"><input type="button" value="返回" onclick="javascript:location.href='?do=que'"></div>
</fieldset>