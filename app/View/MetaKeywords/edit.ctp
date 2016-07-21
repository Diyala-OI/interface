<div class="metaKeywords form">
<?php echo $this->Form->create('MetaKeyword'); ?>
	<fieldset>
		<legend><?php echo __('Edit Meta Keyword'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('keyword');
		echo $this->Form->input('WikiArticle');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MetaKeyword.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('MetaKeyword.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Meta Keywords'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Wiki Articles'), array('controller' => 'wiki_articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Wiki Article'), array('controller' => 'wiki_articles', 'action' => 'add')); ?> </li>
	</ul>
</div>
