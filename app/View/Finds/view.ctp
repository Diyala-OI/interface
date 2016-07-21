<div id="find">
<h1><?php echo $find['Find']['FDNO'].': '.$find['Find']['COLOR'].' ';

$key = 'MATERIAL_DESCR';
$bad = array(
    'unknown',
    'uncertain',
		''
);

if ((!empty($material[0]['material3'])) && (!in_array($material[0]['material3'][$key],$bad))){
echo $material[0]['material3'][$key];
}
elseif ((!empty($material[0]['material2'])) && (!in_array($material[0]['material2'][$key],$bad))){
echo $material[0]['material2'][$key];
}
elseif ((!empty($material[0]['material1'])) && (!in_array($material[0]['material1'][$key],$bad))){
	echo $material[0]['material1'][$key];
}
echo '  '; 

unset($key, $bad);
if ($find['VMFind']['DESCRN_1']!=null){
echo $find['VMFind']['DESCRN_1'];
}
else{
echo $find['VMFind']['DESCR1'];
}
?>
</h1>
<h2>Object page</h2>
<?php if(!empty($find['DigitalImg'])) : ?>
<div id="images" class="find-section">
<ul id="css3-slider">
<?php
foreach ($find['DigitalImg'] as $k => $image):

if ($image['THUMBNAIL_IND'] == 'N' &&  $image['SCREEN_IMG_IND'] == 'Y' ):
$kk=$k+1;
?>
<li>
<input type="radio" id="s<?php echo $k;?>" name="num" <?php if ($k==0){echo 'checked="true"';} ?> />
<label for="s<?php echo $k;?>"><?php echo $kk;?></label>
<img src="http://diyala.uchicago.edu<?php echo$dirs[$image['IMG_DIRECTORY_OBJ']].$image['IMG_FILE_NM'];?>" />
</li>
<?php
endif;

endforeach;

?>
</ul>
</div>
<div id="clear"></div>
<?php else : ?>
This object does not have an associated picture yet <br/>
<?php endif; ?>
<div id="docs" class="find-section">
<h3>Literature</h3>
list of docs<br />
bibliography<br />
</div>




<div id="excavation" class="find-section">
<h3>Excavation</h3>
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
</div>

<div id="groups" class="find-section">
<h3>Grouping</h3>
container or contained<br />
link to container if contained<br />
sets info : thumbnails of other object<br />s in that set with title and find number<br />
</div>


<div id="analysis" class="find-section">
<h3>Storage, Description and Analysis</h3>
Museum number : <?php echo$find['Find']['MUSEUM_REGISTRY_NBR'];?> <br />
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
<div class="find-section">
object card<br />
field register<br />
field diaries
</div>
<div class="find-section">
if seal or tablet : link to seal designs and inscription entries
</div>
<div id="loc" class="find-section">
<h3>Localisation</h3>
elevation<br />
Locus X
Area X
<br />
</div>

<div id="links" class="find-section">
<h3>Related objects</h3>
other objects of same class in the same locus<br />
obects of the set<br />
etc..
</div>



<div class="find-section">
<h3>Outside links</h3>
<a href="http://diyalaproject.uchicago.edu/pls/apex/f?p=DIYALAAPPL:41:::NO:41:P41_FIND_ID:<?php echo$find['Find']['FIND_ID'];?>" target="apex">Scholar interface (<?php echo $find['Find']['FDNO']?>)</a><br />
<?php if ($find['MUSEUM_NM']=='OI') :?>
<a href=http://oi-idb.uchicago.edu/#D/MC/<?php echo$find['Idb']['idb_id'];?>" target="idb">Oriental Institute IDB (eMU id #<?php echo$find['Idb']['idb_id'];?> )</a>
<?php endif;?>
<br />
</div>


<div class="clear">
</div>


</div>