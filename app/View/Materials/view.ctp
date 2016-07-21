<div>
<?php //print_r($material) ?>
<h2>Material: <?php echo $material['Material']['MATERIAL_DESCR']; ?></h2>
<?php if($material['Material']['LVL_NBR']!=1):?>
Parent(s) : 

<br />
<?php endif;?>
<?php if (!empty($material['Material']['MATERIAL_CMTS'])):?>
Comments : <?php echo $material['Material']['MATERIAL_CMTS']?><br />
<?php endif;?>
</div>
<br /><br />
<div id="associated_finds">
<table style="background-color:white">
<caption>Associated finds</caption>
<tr>
<th>Image<?php //echo $this->Paginator->sort('no_perso');?></th>
<th>Find number<?php //echo $this->Paginator->sort('no_museum');?></th>
<th>Object Description<?php //echo $this->Paginator->sort('no_cdli');?></th>
<th>Material(s)<?php //echo $this->Paginator->sort('period_id');?></th>
<th>Museum number<?php //echo $this->Paginator->sort('ruler_id');?></th>
<th>Links<?php //echo $this->Paginator->sort('date_year');?></th>
</tr>
<?php
  $i = 0;
  foreach ($material['Find'] as $find):
 	$class = null;
	if ($i++ % 2 == 0) {$class = ' class="altrow"'; }
/*	
	$z=0;
foreach ($find['Material'] as $material){
	if ($material['LVL_NBR']==1){
	$new_material[$z]['material1']=$material;
	$z++;
}}
foreach ($find['Material'] as $material){
	if ($material['LVL_NBR']==2){
		foreach ($new_material as $key => $material_item){ // roll through lvl 1 materials
			if ($material_item['material1']['MATERIAL_CD'] == $material['PARENT_MATERIAL_CD']){ // check cd
			$new_material[$key]['material2']=$material;
}
}
}
}

$material = $new_material;
	
	*/
	
	?>
<tr<?php echo $class;?>>
<td>
<?php 
$j=0;

foreach ($find['DigitalImg'] as $image):
if ($image['SCREEN_IMG_IND']=='Y'):
$j++;
?>
<img src="http://diyala.uchicago.edu<?php echo $dirs[$image['IMG_DIRECTORY_OBJ']].$image['IMG_FILE_NM'];?>" style="max-width:100px" />
<?php
endif;
if ($j==1) {break;}
endforeach;
?>
</td>
<td>
<?php echo $this->Html->link(__($find['FDNO'], true), array('controller' => 'finds', 'action' => 'view', $find['FIND_ID'])); ?>
</td><td>
<?php echo $find['COLOR'].' ';

$key = 'MATERIAL_DESCR';
$bad = array(
    'unknown',
    'uncertain',
    'Unknown',
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

</td>
<td><ul>

<?php
foreach ($material as $mat):
?>
<li>
<?php 
if (!empty($mat['material1'])):
   echo $this->Html->link(
   $mat['material1']['MATERIAL_DESCR'],
   array('controller' => 'materials', 'action' => 'view', $mat['material1']['MATERIAL_ID']));
endif;
    
if (!empty($mat['material2'])):
  echo " > ";
  echo $this->Html->link(
  $mat['material2']['MATERIAL_DESCR'],
  array('controller' => 'materials', 'action' => 'view', $mat['material2']['MATERIAL_ID']));
endif;

if (!empty($mat['material3'])):
  echo " > ";
  echo $this->Html->link(
  $mat['material3']['MATERIAL_DESCR'],
  array('controller' => 'materials', 'action' => 'view', $mat['material3']['MATERIAL_ID']));
endif;
?>
<li>
<?php 
endforeach;?>
</ul></td>
<td><?php echo $find['MUSEUM_REGISTRY_NBR'] ?></td> 
<td><a href="http://diyalaproject.uchicago.edu/pls/apex/f?p=DIYALAAPPL:41:::NO:41:P41_FIND_ID:<?php echo$find['FIND_ID'];?>" target="apex"><img src="/img/hat.png"></a>
 <?php
if ($find['MUSEUM_NM']=='OI' && !empty($find['Idb']['idb_id'])): ?>
<a href="http://oi-idb.uchicago.edu/#D/MC/<?php echo $find['Idb']['idb_id'];?>" target="idb">OI iDB</a></td>
<?php endif;?>
</td>
</tr>
<?php endforeach; ?>
</table>
</div>