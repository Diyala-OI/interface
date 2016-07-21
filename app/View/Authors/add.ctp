<div class="authors form">
<?php echo $this->Form->create('Author'); ?>
	<fieldset>
		<legend><?php echo __('Add Author'); ?></legend>
	<?php
		echo $this->Form->input('author_title_id');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('WikiArticle');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Authors'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Author Titles'), array('controller' => 'author_titles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Author Title'), array('controller' => 'author_titles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Wiki Articles'), array('controller' => 'wiki_articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Wiki Article'), array('controller' => 'wiki_articles', 'action' => 'add')); ?> </li>
	</ul>
</div>
