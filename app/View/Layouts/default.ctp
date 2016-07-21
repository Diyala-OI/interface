<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<?php
	echo $this->Html->meta('icon');
	echo $this->Html->css(array('bootstrap','style','dark', 'menu', 'font-icons', 'animate','all-sites', 'magnific-popup','responsive','diyala3','maps'));
	echo $this->fetch('meta');
	echo $this->fetch('script');
	echo $this->Html->script('ckeditor/ckeditor');
 	?>
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
	<title><?php echo $title_for_layout;?></title>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-65369707-1', 'auto');
		ga('send', 'pageview');
	</script>
	</head>
<body class="stretched no-transition">
	<div id="wrapper" class="clearfix">
		<?php if( $this->Session->read('Auth.User.role') == ('admin'||'author') ): ?>
		<div id="top-bar">
			<div class="container-fullwidth clearfix">
				<div class="col_half nobottommargin">

					<!-- Top Links
					============================================= -->

		<div class="top-links">
		<?php echo $this->element('admin_menu');
		?>
					</div>
<!-- .top-links end -->
				</div>
				<div class="col_half fright col_last nobottommargin">
  			</div>
			</div>
		</div><!-- #top-bar end -->
	<?php endif; ?>
		<!-- Header
		============================================= -->
		<header id="header">
			<div id="header-wrap">
				<div class="container-fullwidth clearfix">
					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="/" class="standard-logo" data-dark-logo="/img/anzu.png"><img src="/img/anzu.png" alt="Diyala Project"></a>
					</div><!-- #logo end -->
					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">
						<?php
						echo $this->element('menu');
						echo $this->element('wiki_menu');
						?>
					<!-- Top Search
						============================================= -->
						<div id="top-search">
							<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
							<form action="search.html" method="get">
								<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
							</form>
						</div><!-- #top-search end -->
					</nav><!-- #primary-menu end -->
				</div>
			</div>
		</header><!-- #header end -->
		<?php echo $this->fetch('content'); ?>

		<!-- Footer
		============================================= -->
		<footer id="footer">

			<div class="container-fullwidth">
				<?php echo $this->element('copyright');
				?>

</div>
		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="js/functions.js"></script>

</body>
</html>

<?php if (Configure::read('debug') == 2) { echo $this->element('sql_dump');} ?>
