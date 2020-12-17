<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
	<p class="t cent botli"><?= $title_str[$do]; ?></p>
	<!-- 修改 -->
	<form method="post" action="./api/edit.php">
		<table width="100%">
			<tbody>
				<tr class="yel">
					<td width="50%">網站標題</td>
					<td width="15%">顯示</td>
					<td width="15%">刪除</td>
					<td></td>
				</tr>
				<?php
				$rows = $Mvim->all();
				foreach ($rows as $row) {
				?>
					<tr class="cent">
						<!-- 如果同時更動多筆修改紀錄，要記得用陣列存取 -->
						<td class="cent"><img src="./img/<?= $row['img']; ?>" style="width:80px;height:60px"></td>
						<td><input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ""; ?>></td>
						<td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
						<td>
							<input type="button" value="更新動畫" onclick="op('#cover','#cvr','./popup/upload.php?table=<?= $do; ?>&id=<?= $row['id']; ?>')">
						</td>
						<input type="hidden" name="id[]" value="<?= $row['id']; ?>">
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>

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