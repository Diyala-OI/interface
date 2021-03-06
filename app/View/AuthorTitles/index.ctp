<div class="authorTitles index">
	<h2><?php echo __('Author Titles'); ?></h2>
	<table class="table table-striped">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($authorTitles as $authorTitle): ?>
	<tr>
		<td><?php echo h($authorTitle['AuthorTitle']['id']); ?>&nbsp;</td>
		<td><?php echo h($authorTitle['AuthorTitle']['title']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $authorTitle['AuthorTitle']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $authorTitle['AuthorTitle']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $authorTitle['AuthorTitle']['id']), null, __('Are you sure you want to delete # %s?', $authorTitle['AuthorTitle']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Author Title'), array('action' => 'add')); ?></li>
	</ul>
</div>
