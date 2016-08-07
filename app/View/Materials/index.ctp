<div class="content-wrap">
<div class="container clearfix">
<pre>
<?php print_r($materials);?>
</pre>
	<table>
	<tr>
		<th><?php echo $this->Paginator->sort('material_descr');?></th>
			<th>Related finds</th>
	</tr>
	<?php
	$i = 0;
	foreach ($materials as $material):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><a href="/materials/view/<?php $material['Material']['material_id'];?>">
			<?php echo $material['Material']['material_descr']; ?></a></td>
		<td>count finds</td>
	</tr>
<?php endforeach; ?>
	</table>
	</div></div></div>
