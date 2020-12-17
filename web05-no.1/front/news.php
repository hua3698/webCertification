<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<?php include "marquee.php"; ?>
	<div style="height:32px; display:block;"></div>
	<!-- 正中央 -->
	<span class="t botli">更多最新消息區</span>

	<?php
	$all= $News->count(['sh'=>1]); //撈出所有最新消息
	$num=5; //每頁放幾筆
	$pages=ceil($all/$num); //一共有幾頁
	$now=(isset($_GET['p']))?$_GET['p']:1;
	$start= ($now-1) *$num;
	?>


	<ol start="<?=$start+1;?>">
		<?php
		$news = $News->all(['sh' => 1]," limit $start, $num");
		foreach ($news as $key => $new) {
			echo "<li class='sswww' style='margin:3px;'>" . mb_substr($new['text'], 0, 20);
			echo "<div class='all' style='display:none'>{$new['text']}</div>";
			echo "</li>";
		}
		?>
	</ol>
	<div style="text-align:center;">
		<?php
		if($now>1){
			?>
			<a class='bl' style='font-size:30px;' href='?do=news&p=<?=$now-1;?>'>&lt;&nbsp;</a>
			<?php
		}
		for($i=1;$i<=$pages;$i++){
			if($i==$now){
				$font="font-size:36px";
			}else{
				$font="font-size:30px";
			}
			echo "<a href='?do=news&p=$i' style='$font'>";
			echo $i;
			echo "</a>";
		}
		if($now<$pages){
			?>
		<a class='bl' style='font-size:30px;' href='?do=news&p=<?=$now+1;?>'>&nbsp;&gt;</a>
		<?php
		}
		?>
	</div>
</div>
<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
<script>
	$(".sswww").hover(
		function() {
			$("#alt").html("<pre>" + $(this).children(".all").html() + "</pre>").css({
				"top": $(this).offset().top - 50
			})
			$("#alt").show()
		}
	)
	$(".sswww").mouseout(
		function() {
			$("#alt").hide()
		}
	)
</script>