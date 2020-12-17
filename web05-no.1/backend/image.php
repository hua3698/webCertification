<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
	<p class="t cent botli"><?= $title_str[$do]; ?></p>
	<!-- 修改 -->
	<form method="post" action="./api/edit.php">
		<table width="100%">
			<tbody>
				<tr class="yel">
					<td width="50%">校園印象資料圖片圖片</td>
					<td width="15%">顯示</td>
					<td width="15%">刪除</td>
					<td></td>
				</tr>
				<?php
				$all = $News->count(['sh' => 1]); //撈出所有最新消息
				$num = 3; //每頁放幾筆
				$pages = ceil($all / $num); //一共有幾頁
				$now = (isset($_GET['p'])) ? $_GET['p'] : 1;
				$start = ($now - 1) * $num;

				$rows = $Image->all(" limit $start, $num");
				foreach ($rows as $row) {
				?>
					<tr class="cent">
						<!-- 如果同時更動多筆修改紀錄，要記得用陣列存取 -->
						<td width="45%"><img src="./img/<?= $row['img']; ?>" style="width:100px;height:68px"></td>
						<td width="7%"><input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ""; ?>></td>
						<td width="7%"><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
						<td>
							<input type="button" value="更換圖片" onclick="op('#cover','#cvr','./popup/upload.php?table=<?= $do; ?>&id=<?= $row['id']; ?>')">
						</td>
						<input type="hidden" name="id[]" value="<?= $row['id']; ?>">
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<div class="cent">
			<?php
			if ($now > 1) {
			?>
				<a class='bl' style='font-size:30px;' href='?do=image&p=<?= $now - 1; ?>'>&lt;&nbsp;</a>
			<?php
			}
			for ($i = 1; $i <= $pages; $i++) {
				if ($i == $now) {
					$font = "font-size:36px";
				} else {
					$font = "font-size:30px";
				}
				echo "<a href='?do=image&p=$i' style='$font'>";
				echo $i;
				echo "</a>";
			}
			if ($now < $pages) {
			?>
				<a class='bl' style='font-size:30px;' href='?do=image&p=<?= $now + 1; ?>'>&nbsp;&gt;</a>
			<?php
			}
			?>
		</div>
		<!-- 新增 -->
		<table style="margin-top:40px; width:70%;">
			<tbody>
				<tr>
					<input type="hidden" name="table" value="<?= $do; ?>">
					<td width="200px">
						<input type="button" onclick="op('#cover','#cvr','./popup/<?= $do; ?>.php?table=<?= $do; ?>')" value="<?= $add_str[$do]; ?>">
					</td>
					<td class="cent">
						<input type="submit" value="修改確定">
						<input type="reset" value="重置">
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</div>