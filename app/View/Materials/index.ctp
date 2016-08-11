<div class="content-wrap">
<div class="container clearfix">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('MATERIAL_DESCR');?></th>
			<th>Related finds</th>
	</tr>
	<?php
	$i = 0;
	foreach ($materials as $material):

	?>
	<tr>
		<td><a href="/materials/view/<?php echo $material['Material']['MATERIAL_ID'];?>">
			<?php echo $material['Material']['MATERIAL_DESCR']; ?></a></td>
		<td>count finds</td>
	</tr>
<?php endforeach; ?>
	</table>
	</div></div></div>
