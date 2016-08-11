<div class="content-wrap">
<div class="container clearfix">
<h2>Levels maps of <?php echo $area['Area']['SITE_SUBDIV_NM']; ?></h2>
<p>
Hover on the map to see the loci you can click on to further browse into the data.<br />
The delimitations of the loci indicated on the map are <em>approximate</em>. </p>

<div id="tabs">
<?php
$i=0;
foreach ($area['ArchLevel'] as $arch_level):
if (isset($arch_level['ArchLevelMap']['map_file']) || isset($arch_level['Floor'][0]['ArchLevelMap']['map_file'])):
if (isset($arch_level['ArchLevelMap']['map_file'])):
?>


<div class="tab" id="level-<?php echo $arch_level['id'] ?>">
  <a href="#level-<?php echo $arch_level['id'] ?> <?php if ($i==0){echo "no_target_bold";}?>" class="tab_tip"><?php echo $arch_level['SITE_SUBDIV_NM'] ?></a>
<div id="inner">

<svg
xmlns="http://www.w3.org/2000/svg"
xmlns:xlink="http://www.w3.org/1999/xlink"
width="900px" viewBox="0 0 680 543" >
<image xlink:href="/img/maps/<?php echo $area['AreaMap']['map_file']?>" width="680px" height="543px" />
<image xlink:href="/img/maps/lvls/<?php echo $arch_level['ArchLevelMap']['map_file']?>" width="680px" height="543px" />
<defs>
  <pattern id="diagonalHatch" patternUnits="userSpaceOnUse" width="4" height="4" patternTransform="rotate(130 0 0)">
    <path d="M -1,2 l 6,0" stroke="#000" stroke-width="2"/>
  </pattern>
</defs>

<?php
foreach ($arch_level['LocusCoord'] as $locus):
if (isset($locus['path'])): ?>
<a xlink:href="/loci/view/<?php echo $locus['Locus']['id']?>" xlink:title="<?php echo $locus['Locus']['SQ_H_COORD'].$locus['Locus']['SQ_V_COORD'].':'.$locus['Locus']['LOCUS_NBR'];?> <?php echo $locus['desc_short'] ?>">
  <path
     style="fill:url(#diagonalHatch)"
     d="<?php echo $locus['path']?>"
     id="locus-<?php echo $locus['Locus']['id']?>" class="locus_area" />
     </a>
<?php
endif; // if (isset($locus['path'])):
endforeach; //  ($arch_level['LocusCoord'] as $locus): ?>
</svg>
</div>
</div>
<?php
endif; $i++; // if (isset($arch_level['ArchLevelMap']['map_file'])):

foreach ($arch_level['Floor'] as $floor):
if (isset($floor['ArchLevelMap']['map_file'])):
?>
  <div class="tab" id="level-<?php echo $floor['id'] ?>">
    <a href="#level-<?php echo $floor['id'] ?> <?php if ($i==0){echo "no_target_bold";}?>" class="tab_tip"><?php echo $arch_level['SITE_SUBDIV_NM'].' '.$floor['SITE_SUBDIV_NM'] ?></a>
  <div id="inner">

  <svg
  xmlns="http://www.w3.org/2000/svg"
  xmlns:xlink="http://www.w3.org/1999/xlink"
  width="900px" viewBox="0 0 680 543" >
  <image xlink:href="/img/maps/<?php echo $area['AreaMap']['map_file']?>" width="680px" height="543px" />
  <image xlink:href="/img/maps/lvls/<?php echo $floor['ArchLevelMap']['map_file']?>" width="680px" height="543px" />
  <defs>
    <pattern id="diagonalHatch" patternUnits="userSpaceOnUse" width="4" height="4" patternTransform="rotate(130 0 0)">
      <path d="M -1,2 l 6,0" stroke="#000" stroke-width="2"/>
    </pattern>
  </defs>

  <?php
  foreach ($floor['LocusCoord'] as $locus):
  if (isset($locus['path'])): ?>
  <a xlink:href="/loci/view/<?php echo $locus['Locus']['id']?>" xlink:title="<?php echo $locus['Locus']['SQ_H_COORD'].$locus['Locus']['SQ_V_COORD'].':'.$locus['Locus']['LOCUS_NBR'];?> <?php echo $locus['desc_short'] ?>">
    <path
       style="fill:url(#diagonalHatch)"
       d="<?php echo $locus['path']?>"
       id="locus-<?php echo $locus['Locus']['id']?>" class="locus_area" />
       </a>
  <?php
endif;//(isset($locus['path'])):
endforeach;//($floor['LocusCoord'] as $locus): ?>
  </svg>
  </div>
  </div>
  <?php

endif;//(isset($arch_level['Floor']['ArchLevelMap']['map_file'])):
endforeach;//($arch_level['Floor'] as $floor):

endif;
endforeach; //($area['ArchLevel'] as $arch_level):

?>
</div>

  <!-- <h2>Other levels</h2> -->

<?php
// if no coordinates, display in list below


//foreach ($area['ArchLevel'] as $arch_level):
//debug($arch_level['Locus']);
//if (!isset($arch_level['ArchLevelMap']['map_file'])):

?>
<?php //echo $arch_level['SITE_SUBDIV_NM'] ?>
: <br />
<?php
//foreach ($arch_level['Locus'] as $locus): ?>
<!--<a href="/loci/view/<?php //echo $locus['Locus']['id']?>"> --> <?php //echo $locus['SQ_H_COORD'].$locus['SQ_V_COORD'].':'.$locus['LOCUS_NBR'];?></a><br />
<?php //endforeach; ?>
<?php //endif;
//endforeach;
?>

<?php unset($area); ?>

</div>

</div>
