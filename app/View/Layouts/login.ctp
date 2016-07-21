<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
<?php
echo $this->Html->meta('icon');
echo $this->Html->css('ext-custom.css');
echo $this->Html->css('cake.generic');
echo $this->Html->css('diyala');
echo $this->Html->css('menu');
echo $this->Html->css('all-sites');
echo $this->Html->css('slider');
echo $this->fetch('meta');
echo $this->fetch('css');
echo $this->fetch('script');
echo $this->Html->script('ckeditor/ckeditor');
?>
</head>
<body>
<div id="container">
	<header>
	<h1><a href="/">The Diyala Project</a></h1>
	</header>
<div id="content">
<?php echo $this->Session->flash(); ?>
<?php echo $this->fetch('content'); ?>
</div>
<div id="footer"><?php echo $this->element('copyright'); ?></div>
</div>
</body>
</html>