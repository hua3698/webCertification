<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
	<p class="t cent botli"><?= $title_str[$do]; ?></p>
	<!-- 修改 -->
	<form method="post" action="./api/edit.php">
		<table width="100%">
			<tbody>
				<tr class="yel">
					<td width="40%">帳號</td>
					<td width="40%">密碼</td>
					<td width="10%">刪除</td>
				</tr>
				<?php
				$rows = $Admin->all();
				foreach ($rows as $row) {
				?>
					<tr>
						<!-- 如果同時更動多筆修改紀錄，要記得用陣列存取 -->
						<td><input type="text" name="acc[]" value="<?= $row['acc']; ?>" style="width: 80%;"></td>
						<td><input type="password" name="pw[]" value="<?= $row['pw']; ?>"></td>
						<td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
						<input type="hidden" name="id[]" value="<?=$row['id'] ;?>">
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
						<input type="submit" value="新增">
						<input type="reset" value="重置">
					</td>
				</tr>
			</tbody>
		</table>
	</form>

</div>