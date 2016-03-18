<b>Таблица</b> | <a href="index.php?view=list">Список</a>

<br/><br/>

<table>
	<tr>
	<?php $i = 0; 
		  foreach ($photos as $photo): ?>

		<? if ($i % 4 == 3): ?>
			</tr><tr>
		<? endif; ?>
		<td>
			<a href="photo.php?id=<?=$photo['id']?>">
				<img src="<?=$photo['id'] . '.' . $photo['type']?>" />
			</a>
		</td>
		<?php $i++; ?>

	<?php endforeach; ?>
	</tr>
</table>

<br/><br/>