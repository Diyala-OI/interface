<!-- File: /app/View/Sites/index.ctp -->
<div class="content-wrap">
<div class="container clearfix">
<h2>Explore the Diyala Sites Map</h2>
<p>
Click on the name of the site you would like to visit. Check out the list below for additional choices.
</p>

<ul id="all-sites">

<?php
foreach ($sites as $site){
	if ($site['SiteCoord']['width']!=0){
 ?>
<li id="<?php echo $site['Site']['site_abbrv_cd']; ?>" style="width: <?php echo $site['SiteCoord']['width']; ?>px; 	height: <?php echo $site['SiteCoord']['height']; ?>px; 	top: <?php echo $site['SiteCoord']['top']; ?>px; 	left: <?php echo $site['SiteCoord']['left']; ?>px;">

<!-- <a href="/#"> -->
<a href="/sites/view/<?php echo $site['Site']['site_abbrv_cd']; ?>">
<?php echo $site['Site']['site_nm']; ?>
<span>
<?php echo $site['SiteCoord']['desc_short']; ?>
</span>
</a>
</li>
<?php
	}
}?>

</ul>
<br /><br /><br />
<h2>Other sites</h2>
<ul id="other-sites">
<?php
foreach ($sites as $site){
	if ($site['SiteCoord']['width']==0){
 ?>
<li>
<!--<a title="<?php //echo $site['site_coords']['desc_short']; ?>" href="/#"><?php //echo $site['Site']['site_nm']; ?></a> -->
<a title="<?php echo $site['SiteCoord']['desc_short']; ?>" href="/sites/view/<?php echo $site['Site']['site_abbrv_cd']; ?>"><?php echo $site['Site']['site_nm']; ?></a>

</li>
<?php }}?>
</ul>

<?php
 unset($site); ?>
 </div> </div>
