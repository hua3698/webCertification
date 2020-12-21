<?php include "base.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>卓越科技大學校園資訊系統</title>
	<link href="css.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
	<script src="jquery-1.9.1.min.js"></script>
	<script src="js.js"></script>
</head>

<body>
	<div id="cover" style="display:none; ">
		<div id="coverr">
			<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl('#cover')">X</a>
			<div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
		</div>
	</div>
	<div id="main">
		<a title="<?= $Title->find(['sh' => '1'])['text']; ?>" href="index.php">
			<div class="ti" style="background:url('img/<?= $Title->find(['sh' => '1'])['img']; ?>'); background-size:cover;"></div>
			<!--標題-->
		</a>
		<div id="ms">
			<div id="lf" style="float:left;">
				<div id="menuput" class="dbor">
					<!--主選單放此-->
					<span class="t botli">主選單區</span>
					<?php
					$mainmu = $Menu->all(['sh' => 1, 'parent' => 0]);
					foreach ($mainmu as $main) {
					?>
						<div class="mainmu">
							<a style="color:#000; font-size:13px; text-decoration:none;" href="<?= $main['href']; ?>"><?= $main['text']; ?></a>
							<div class="mw" style="display: none;position:relative;top:-5px;z-index:87; width:100px; margin-left:100px"> <!-- 在次選單下面蓋一個區域，可以讓滑鼠mouseover更加正確 -->
								<?php
								if ($Menu->count(['parent' => $main['id']]) > 0) {
									$subs = $Menu->all(['parent' => $main['id']]);
									foreach ($subs as $sub) {
								?>
										<a style="color:#000; font-size:13px; text-decoration:none;" href="<?= $sub['href']; ?>">
											<div class="mainmu2"><?= $sub['text']; ?></div>
										</a>
								<?php
									}
								}
								?>
							</div>
						</div>
					<?php }; ?>
				</div>

				<div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
					<span class="t">進站總人數 :<?= $Total->find(1)['total']; ?></span>
				</div>
			</div>
			<?php
			$do = (isset($_GET['do'])) ? $_GET['do'] : 'main';
			$file = "./front/" . $do . ".php";
			if (file_exists($file)) {
				include $file;
			} else {
				include "./front/main.php";
			}

			?>

			<div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
				<!--右邊-->
<?php
if(isset($_SESSION['login'])){
	?>
	<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo('backend.php')">返回管理</button>
<?php
}else{
	?>
<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo('?do=login')">管理登入</button>
<?php
}

?>

				<div style="width:89%; height:480px;" class="dbor cent">
					<span class="t botli">校園映象區</span>
					<div onclick="pp(1)">
						<img src="icon/up.jpg">
					</div>
					<?php
					$imgs = $Image->all(['sh' => 1]);
					foreach ($imgs as $key => $img) {
						echo "<div class='im' id='ssaa$key'><img src='img/{$img['img']}' style='width: 150px;height:103px;margin:5px;border:3px solid orange'></div>";
					}
					?>
					<div onclick="pp(2)">
						<img src="icon/dn.jpg">
					</div>
					<!-- 圖片超出區域會被葉偉吃掉的原因是，越後面出現的元素z-index越高，因此會把圖片蓋掉 -->

					<script>
						var nowpage = 0,
							/* 當前頁數 */
							num = <?= $Image->count(['sh' => 1]); ?>;

						function pp(x) {
							var s, t;
							if (x == 1 && nowpage - 1 >= 0) nowpage--; //當前頁數最少要是1
							if (x == 2 && (nowpage + 1) * 3 <= num - 3) nowpage++;
							$(".im").hide() //class im 全部隱藏
							for (s = 0; s <= 2; s++) {
								t = s * 1 + nowpage * 1;
								$("#ssaa" + t).show()
							}
						}
						pp(1)
					</script>
				</div>
			</div>
		</div>
		<div style="clear:both;"></div>
		<div style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
			<span class="t" style="line-height:123px;"><?= $Bottom->find(1)['bottom']; ?></span>
		</div>
	</div>

</body>

</html>