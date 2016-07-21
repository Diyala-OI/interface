<!-- cvbxcxcvbccxd448 930 805v<!DOCTYPE html> -->
<html>
<head>
<?php echo $this->Html->charset(); ?>
<title><?php echo $title_for_layout; ?></title>
<?php
echo $this->Html->meta('icon');
echo $this->Html->css(array('ext-custom','cake.generic','diyala', 'menu', 'admin_menu', 'all-sites', 'slider','maps'));
echo $this->fetch('meta');
echo $this->fetch('script');
echo $this->Html->script('ckeditor/ckeditor');
?>
</head>
<body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-65369707-1', 'auto');
  ga('send', 'pageview');
</script>
<div id="container">
<header>
<h1><a href="/">The Diyala Project</a></h1>
<div id="main-menu">
<?php echo $this->element('wiki_menu'); ?>
<?php echo $this->element('menu'); ?>
<?php
// echo $this->Form->create('WikiArticle', array('url' => array_merge(array('action' => 'find'),$this->params['pass'])));
// echo $this->Form->input('Search');
// echo $this->Form->submit(__('Search'));
// echo $this->Form->end();?>
</div>
</header>
<?php
if( $this->Session->read('Auth.User.role') == ('admin'||'author') ): ?>
<div id="admin-menu">
<?php echo $this->element('admin_menu'); ?>
</div>
<?php endif; ?>
<div id="content">
<?php // echo $this->Html->getCrumbs(' > ', 'Home'); ?>
<?php echo $this->Session->flash(); ?>
<?php echo $this->fetch('content'); ?>
</div>

<div id="footer"><?php echo $this->element('copyright'); ?></div>
</div>

<?php if (Configure::read('debug') == 2) { echo $this->element('sql_dump');} ?>
</body>
</html>
