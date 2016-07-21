<div class="menuItems form">
<?php echo $this->Form->create('MenuItem'); ?>
	<fieldset>
		<legend><?php echo __('Edit Menu Item'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('url');
		echo $this->Form->input('parent_id');
		echo $this->Form->input('lft');
		echo $this->Form->input('rght');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MenuItem.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('MenuItem.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Menu Items'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Menu Items'), array('controller' => 'menu_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Menu Item'), array('controller' => 'menu_items', 'action' => 'add')); ?> </li>
	</ul>
</div>
