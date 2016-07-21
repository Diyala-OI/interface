<div class="wikiArticles edit">
<?php echo $this->Form->create('WikiArticle'); ?>
	<fieldset>
		<legend><?php echo __('Edit Wiki Article'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('parent_id', array('options'=>$parentWikiArticles, 'empty'=>'--------'));  
		echo $this->Form->textarea('body',array('class'=>'ckeditor'));
		echo $this->Form->input('meta_description');
		echo $this->Form->input( 'url', array('disabled'=> 'disabled')); 
						echo $this->Form->input('Author.Author');
	  echo $this->Form->input('published');
		?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
