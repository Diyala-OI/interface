<div class="metaKeywords view">
<h2><?php  echo __('Meta Keyword'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($metaKeyword['MetaKeyword']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Keyword'); ?></dt>
		<dd>
			<?php echo h($metaKeyword['MetaKeyword']['keyword']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Meta Keyword'), array('action' => 'edit', $metaKeyword['MetaKeyword']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Meta Keyword'), array('action' => 'delete', $metaKeyword['MetaKeyword']['id']), null, __('Are you sure you want to delete # %s?', $metaKeyword['MetaKeyword']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Meta Keywords'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meta Keyword'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Wiki Articles'), array('controller' => 'wiki_articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Wiki Article'), array('controller' => 'wiki_articles', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Wiki Articles'); ?></h3>
	<?php if (!empty($metaKeyword['WikiArticle'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Meta Description'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($metaKeyword['WikiArticle'] as $wikiArticle): ?>
		<tr>
			<td><?php echo $wikiArticle['id']; ?></td>
			<td><?php echo $wikiArticle['title']; ?></td>
			<td><?php echo $wikiArticle['body']; ?></td>
			<td><?php echo $wikiArticle['created']; ?></td>
			<td><?php echo $wikiArticle['modified']; ?></td>
			<td><?php echo $wikiArticle['meta_description']; ?></td>
			<td><?php echo $wikiArticle['url']; ?></td>
			<td><?php echo $wikiArticle['parent_id']; ?></td>
			<td><?php echo $wikiArticle['lft']; ?></td>
			<td><?php echo $wikiArticle['rght']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'wiki_articles', 'action' => 'view', $wikiArticle['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'wiki_articles', 'action' => 'edit', $wikiArticle['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'wiki_articles', 'action' => 'delete', $wikiArticle['id']), null, __('Are you sure you want to delete # %s?', $wikiArticle['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Wiki Article'), array('controller' => 'wiki_articles', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
