<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
	<p class="t cent botli"><?= $title_str[$do]; ?></p>
	<!-- 修改 -->
	<form method="post" action="./api/edit.php">
		<table width="100%">
			<tbody>
				<tr class="yel">
					<td width="30%">主選單名稱</td>
					<td width="30%">選單連結網址</td>
					<td width="10%">次選單數</td>
					<td width="10%">顯示</td>
					<td width="10%">刪除</td>
					<td></td>
				</tr>
				<?php
				$rows = $Menu->all(['parent'=>0]);
				foreach ($rows as $row) {
				?>
					<tr>
						<!-- 如果同時更動多筆修改紀錄，要記得用陣列存取 -->
						<td><input type="text" name="text[]" value="<?= $row['text']; ?>"></td>
						<td><input type="text" name="href[]" value="<?= $row['href']; ?>"></td>
						<td><?=$Menu->count(['parent'=>$row['id']]);?></td>
						<td><input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ""; ?>></td>
						<td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
						<td><input type="button" value="編輯次選單" onclick="op('#cover','#cvr','./popup/submenu.php?table=<?= $do; ?>&id=<?= $row['id']; ?>')"></td>
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