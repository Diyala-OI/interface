<div class="content-wrap">
<div class="container clearfix">
<?php
/*<div id="desc_long"><?php echo $site_info['SiteCoord']['desc_long']?></div>
<?php */
if ($site_info['SiteCoord']['map']!=null)
?>
<div class="col_full">
Hover your mouse on the map and click on the area which interests you.
</div>
<div class="col_full">
<div id="areas-map">
<?php
//$size= getimagesize('img/maps/'.$site_info['SiteCoord']['map']);
$svgfile = simplexml_load_file('img/maps/'.$site_info['SiteCoord']['map']);
$attr = $svgfile->attributes();
$width = preg_replace("/[^0-9,.]/", "", $attr['width']);
$height = preg_replace("/[^0-9,.]/", "", $attr['height']);
?>

<svg
xmlns="http://www.w3.org/2000/svg"
xmlns:xlink="http://www.w3.org/1999/xlink"
width="900px"
viewBox="0 0 <?php echo $width?> <?php echo $height?>">

<image xlink:href=/img/maps/<?php echo $site_info['SiteCoord']['map']?> width="<?php echo $width ?>px" height="<?php echo $height ?>px" />

<?php
$i=1;
foreach ($areas as $area):
if (isset($area['AreaCoord']['path'])):?>
<a xlink:href="/areas/view/<?php echo $area['Area']['site_subdiv_id']?>" xlink:title="<?php echo $area['AreaCoord']['desc_short'] ?>">
  <path
     style="fill:<?php echo $colors[$i] ?>"
     d="<?php echo $area['AreaCoord']['path']?>"
     id="area-<?php echo $area['Area']['site_subdiv_id']?>" class="site_area" />
     </a>
     <?php $i++;?>
     <?php endif; endforeach;?>
     </svg>

</div>
</div>
<div class="col_full">
<h2>Locations list</h2>
<p>Following are the areas of the site of <?php $site_info['Site']['site_nm'] ?>that cannot be shown on a map or that have not yet been associated with a map.</p>
<?php
// if no coordinates, display in list below
foreach ($areas as $area):
if (!isset($area['AreaCoord']['path'])||$area['AreaCoord']['path']==null):?>
<div  class="site-area">
<?php echo $this->Html->link($area['Area']['site_subdiv_nm'], array('controller' => 'areas', 'action' => 'view', $area['Area']['site_subdiv_id'])); ?>
</div>
<?php endif;
endforeach;
?>
<?php unset($area); ?>
</div></div>
