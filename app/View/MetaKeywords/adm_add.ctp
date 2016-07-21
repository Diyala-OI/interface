<div class="metaKeywords form">
<?php echo $this->Form->create('MetaKeyword'); ?>
	<fieldset>
		<legend><?php echo __('Adm Add Meta Keyword'); ?></legend>
	<?php
		echo $this->Form->input('keyword');
		echo $this->Form->input('WikiArticle');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Meta Keywords'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Wiki Articles'), array('controller' => 'wiki_articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Wiki Article'), array('controller' => 'wiki_articles', 'action' => 'add')); ?> </li>
	</ul>
</div>
