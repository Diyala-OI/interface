<div class="menuItems view">
<h2><?php  echo __('Menu Item'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($menuItem['MenuItem']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($menuItem['MenuItem']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($menuItem['MenuItem']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Menu Item'); ?></dt>
		<dd>
			<?php echo $this->Html->link($menuItem['ParentMenuItem']['title'], array('controller' => 'menu_items', 'action' => 'view', $menuItem['ParentMenuItem']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lft'); ?></dt>
		<dd>
			<?php echo h($menuItem['MenuItem']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rght'); ?></dt>
		<dd>
			<?php echo h($menuItem['MenuItem']['rght']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Menu Item'), array('action' => 'edit', $menuItem['MenuItem']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Menu Item'), array('action' => 'delete', $menuItem['MenuItem']['id']), null, __('Are you sure you want to delete # %s?', $menuItem['MenuItem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Menu Items'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menu Item'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Menu Items'), array('controller' => 'menu_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Menu Item'), array('controller' => 'menu_items', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Menu Items'); ?></h3>
	<?php if (!empty($menuItem['ChildMenuItem'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($menuItem['ChildMenuItem'] as $childMenuItem): ?>
		<tr>
			<td><?php echo $childMenuItem['id']; ?></td>
			<td><?php echo $childMenuItem['title']; ?></td>
			<td><?php echo $childMenuItem['url']; ?></td>
			<td><?php echo $childMenuItem['parent_id']; ?></td>
			<td><?php echo $childMenuItem['lft']; ?></td>
			<td><?php echo $childMenuItem['rght']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'menu_items', 'action' => 'view', $childMenuItem['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'menu_items', 'action' => 'edit', $childMenuItem['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'menu_items', 'action' => 'delete', $childMenuItem['id']), null, __('Are you sure you want to delete # %s?', $childMenuItem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Menu Item'), array('controller' => 'menu_items', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
