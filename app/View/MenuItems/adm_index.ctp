<div class="menuItems index">
	<h2><?php echo __('Menu Items'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('url'); ?></th>
			<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
			<th><?php echo $this->Paginator->sort('lft'); ?></th>
			<th><?php echo $this->Paginator->sort('rght'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($menuItems as $menuItem): ?>
	<tr>
		<td><?php echo h($menuItem['MenuItem']['id']); ?>&nbsp;</td>
		<td><?php echo h($menuItem['MenuItem']['title']); ?>&nbsp;</td>
		<td><?php echo h($menuItem['MenuItem']['url']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($menuItem['ParentMenuItem']['title'], array('controller' => 'menu_items', 'action' => 'view', $menuItem['ParentMenuItem']['id'])); ?>
		</td>
		<td><?php echo h($menuItem['MenuItem']['lft']); ?>&nbsp;</td>
		<td><?php echo h($menuItem['MenuItem']['rght']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $menuItem['MenuItem']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $menuItem['MenuItem']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $menuItem['MenuItem']['id']), null, __('Are you sure you want to delete # %s?', $menuItem['MenuItem']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Menu Item'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Menu Items'), array('controller' => 'menu_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Menu Item'), array('controller' => 'menu_items', 'action' => 'add')); ?> </li>
	</ul>
</div>
