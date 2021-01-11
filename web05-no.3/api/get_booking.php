<?php
include_once "../base.php";

$sess = [
    1 => "14:00~16:00",
    2 => "16:00~18:00",
    3 => "18:00~20:00",
    4 => "20:00~22:00",
    5 => "22:00~24:00"
];

$movie = $Movie->find($_GET['movie']);
$date = $_GET['date'];
$session = $_GET['session'];
?>
<style>
    .seat {
        width: 20%;
        height: 26%;
        text-align: center;
        position: relative;
    }

    .booked {
        background: url('icon/03D03.png') center no-repeat;
    }

    .empty {
        background: url('icon/03D02.png') no-repeat center;
    }

    .chk {
        display: block;
        position: absolute;
        bottom: 2px;
        right: 2px;
    }
</style>
<div style="margin:auto;width:540px;height:370px;background:url('icon/03D04.png') no-repeat;padding-top:20px">
    <div style="width:310px;height:328px;margin:auto;display:flex;flex-wrap:wrap">
        <?php
        for ($i = 0; $i < 20; $i++) {
            echo "<div class='seat empty'>";
            echo (floor($i / 5) + 1) . "排" . ($i % 5 + 1) . "號";
            echo "<input type='checkbox' value='$i' class='chk'>";
            echo "</div>";
        }
        ?>
    </div>
</div>
<div style="padding:2% 20%; background:#ccc;">
    <div>您選擇的電影是：<?= $movie['name']; ?></div>
    <div>您選擇的時刻是：<?= $date; ?> <?= $sess[$session]; ?></div>
    <div>您已經勾選<span id="ticket"></span>張票，最多可以購買四張票</div>
    <div class="ct">
        <button onclick="javascript:$('.order,.booking').toggle()">上一步</button>
        <button onclick="finish()">訂購</button>
    </div>
</div>

<script>
    let seats = new Array();
    $(".chk").on("click", function() {

        if ($(this).prop('checked')) {
            //新增座位
            seats.push($(this).val());
            if (seats.length > 4) {
                alert("最多只能購買四張票")
                seats.splice(seats.indexOf($(this).val()), 1)
                $(this).prop('checked', false)
            }
        } else {
            //取消選取座位
            seats.splice(seats.indexOf($(this).val()), 1)
            // $(this).prop('checked', false)
        }
        $("#ticket").text(seats.length)
    })

    function finish(){
        let movie=$("#movie").val()
        let date=$("#date").val()
        let session=$("#session").val()
        $.post("api/finish_order.php",{movie,date,session,seats},function(num){
            console.log(num)
            location.href='index.php?do=finish&num='+num;
        })
    }
</script>