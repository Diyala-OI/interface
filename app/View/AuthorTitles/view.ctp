<div class="authorTitles view">
<h2><?php  echo __('Author Title'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($authorTitle['AuthorTitle']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($authorTitle['AuthorTitle']['title']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Author Title'), array('action' => 'edit', $authorTitle['AuthorTitle']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Author Title'), array('action' => 'delete', $authorTitle['AuthorTitle']['id']), null, __('Are you sure you want to delete # %s?', $authorTitle['AuthorTitle']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Author Titles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Author Title'), array('action' => 'add')); ?> </li>
	</ul>
</div>
