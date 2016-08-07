<div class="content-wrap">
<div class="container clearfix">
  	<div class="col_half">
<?php if(!empty($find['DigitalImg'])) : ?>
  <div class="slider">
    <?php
    foreach ($find['DigitalImg'] as $k => $image):
    if ($image['THUMBNAIL_IND'] == 'N' &&  $image['SCREEN_IMG_IND'] == 'Y' ):
    $kk=$k+1;
    ?>
    <input type="radio" name="slide_switch" id="img<?php echo $k;?>"  <?php if ($k==0){echo 'checked';} ?> />
    <label for="img<?php echo $k;?>">
      <img src="<?php echo IMG_PATH.$dirs[$image['IMG_DIRECTORY_OBJ']].$image['IMG_FILE_NM'];?>"/>
    </label>
    <img src="<?php echo IMG_PATH.$dirs[$image['IMG_DIRECTORY_OBJ']].$image['IMG_FILE_NM'];?>" />
    <?php
    endif;
    endforeach;
  ?>
</div>
<?php else: ?>
<img src="/img/A28582.jpg"/>
<?php endif; ?>
</div>
<div class="col_half col_last">
  <h3>Description and Analysis</h3>
  <br />
  Dating: <br />
  Description: <br />
  Tags:  <br />
  Keywords: <br />
  Materials:
  <ul>

  <?php foreach ($find['Material'] as $mat):?>
  <li>
  <?php if (!empty($mat['material1'])):?>
  <?php echo $this->Html->link(
     $mat['material1']['MATERIAL_DESCR'],
      array('controller' => 'materials', 'action' => 'view', $mat['material1']['MATERIAL_ID']));
  ?>
  <?php endif;?>

  <?php if (!empty($mat['material2'])):?>
  >
  <?php echo $this->Html->link(
     $mat['material2']['MATERIAL_DESCR'],
      array('controller' => 'materials', 'action' => 'view', $mat['material2']['MATERIAL_ID']));
  ?>
  <?php endif;?>
  <?php if (!empty($mat['material3'])):?>
  >
  <?php echo $this->Html->link(
     $mat['material3']['MATERIAL_DESCR'],
      array('controller' => 'materials', 'action' => 'view', $mat['material3']['MATERIAL_ID']));
  ?>
  <?php endif;?>
  <?php endforeach;?>
  </ul>
  <br />
  <?php if(!empty($find['Find']['COLOR'])||$find['Find']['COLOR']!=''): ?>
  Color: <?php echo $find['Find']['COLOR'].' '; ?> </br>
  <?php endif; ?>
  Dimensions: <?php echo $find['VMFind']['FIND_DIMEN']; ?><br />
  <?php
  // Displays only if there is more than one item w/ this find number
  if ($find['Find']['QUANTITY']>1)
  {
  echo "Quantity : ".$find['Find']['QUANTITY'];
  }
  ?>
  </div>
<div class="clear"></div>

<div class="col_one_third">
<h3>Provenience</h3>
Dig season: <?php echo $find['Find']['SEASON']; ?></br>
<?php if (!empty($subdiv['site'])):?>
Site :
<?php echo $this->Html->link(
   $subdiv['site']['SITE_SUBDIV_NM'],
    array('controller' => 'sites', 'action' => 'view', $subdiv['site']['SITE_ABBRV_CD']));
?>
<br />
<?php endif;?>
<?php if (!empty($subdiv['area'])):?>
Area :
<?php echo $this->Html->link(
   $subdiv['area']['sITE_SUBDIV_NM'],
    array('controller' => 'areas', 'action' => 'view', $subdiv['area']['SITE_SUBDIV_ID']));
?>
<br />
<?php endif;?>
<?php if (!empty($subdiv['ArchLevel'])):?>
Level :
<?php echo $subdiv['ArchLevel']['site_subdiv_nm'] ?>
<br />
<?php endif;?>
<?php if (!empty($subdiv['locus'])):?>
Area :
<?php echo $this->Html->link(
   $subdiv['locus']['SITE_SUBDIV_NM'],
    array('controller' => 'locus', 'action' => 'view', $subdiv['locus']['SITE_SUBDIV_ID']));
?>
<br />
<?php endif;?>
<a href="/sites">Diyala Region</a>, Mesopotamia
<br />
</div>

<div class="col_one_third ">
<h3>Grouping</h3>
container or contained<br />
link to container if contained<br />
sets info : thumbnails of other object<br />s in that set with title and find number<br />
</div>

<div class="col_one_third col_last">
<h3>Literature</h3>
list of docs<br />
bibliography<br />
</div>




<div class="clear"></div>
<div class="col_one_third" >
<h3>Storage</h3>
  Museum number(s) :
  <?php
  foreach ($find['FindRegistryInfo'] as $reg):
  echo $reg['MUSEUM_NM'] .' '. $reg['MUS_REGISTRY_NBR']. '<br />';
  endforeach;
  ?>
</div>


<div class="col_one_third">
object card<br />
field register<br />
field diaries
</div>
<div class="col_one_third col_last">
if seal or tablet : link to seal designs and inscription entries
</div>
<div class="clear"></div>


<div class="col_half">
<h3>Related objects</h3>
other objects of same class in the same locus<br />
objects of the set<br />
etc..
</div>
<div class="clear"></div>


<div class="col_one_third" >
<h3>Outside links</h3>
<a href="http://diyalaproject.uchicago.edu/pls/apex/f?p=105:41:::NO:41:P41_FIND_ID:<?php echo$find['Find']['FIND_ID'];?>" target="apex">Scholar interface (<?php echo $find['Find']['FDNO']?>)</a><br />

<?php
foreach ($find['FindRegistryInfo'] as $reg):
    if ($reg['MUSEUM_NM']=='OI'):
        echo $reg['MUSEUM_NM'] .' '. $reg['MUS_REGISTRY_NBR'];?>
        <a href=http://oi-idb.uchicago.edu/#D/MC/<?php echo $idbs[$reg['MUSEUM_NM'].' '.$reg['MUS_REGISTRY_NBR']];?>" target="idb">Oriental Institute IDB (eMU id # <?php echo $idbs[$reg['MUSEUM_NM'].' '.$reg['MUS_REGISTRY_NBR']];?> )</a><br />
        <?php

    endif;
endforeach;
?>

<br />
</div>


</div>

</div>

</section>
