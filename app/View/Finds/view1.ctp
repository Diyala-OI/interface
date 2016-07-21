<div id="find">

<h1><?php echo $find['Material'][0]['material_descr']?> DescrN_1 or Descr_1 (<?php echo $find['Find']['fdno'];?>)</h1>
<h2>Object page</h2>

<img src="http://diyala.uchicago.edu/i/Diyala_Images/Agrab/ag0133_02.jpg" />

 <div id="slideshow-wrap">
<?php
foreach ($images as $k => $v)
{
echo '<input type="radio" id="button-'.$k.'" name="controls" ';
if ($k==0) {echo 'checked=\"checked\"'; }
echo '/>';
echo '<label for=\"button-'.$k.'\"></label>';
echo '<label for=\"button-'.$k.'\" class=\"arrows\" id=\"arrow-'.$k.'\"></label>';
}
?>
<?php

						//
      ?> 
			 <div id="slideshow-inner">
            <ul>
<?php
foreach ($images as $k => $v)
{
echo '<li id=\"slide'.$k.'\">';
echo '<img src="//http://diyala.uchicago.edu'.$images[$k]['dir'].$images[$k]['img_file_nm'].'" />';
echo '<div class=\"description\"><input type=\"checkbox\" id=\"show-description-'.$images[$k].'\"/> <label for=\"show-description-'.$images[$k].'\"';
echo 'class=\"show-description-label\">Description</label><div class=\"description-text\"><h2>';
echo $images[$k]['desc_title'];
echo '</h2><p>';
echo $images[$k]['desc'];
echo '</p></div></div></li>':
}
?>
</ul></div></div>

<div id="docs">
list of docs<br />
bibliography<br />
</div>
<div id="general">
Museum number : <?php echo$find['Find']['museum_registry_nbr'];?> <br />
dating<br />
description<br />

<?php 
// Displays only if there is more than one item w/ this find number
if ($find['Find']['quantity']>1)
{
echo "Quantity : ".$find['Find']['quantity'];
}
?>
<br />
keywords<br />
materials<br />
color : <?php echo $find['Find']['color'];?> </br>
dimensions<br />
<div>
container or contained<br />
link to container if contained<br />
localization info <br />
elevation<br />
<br /><br />
link to object card<br />
link to field register<br />
link to seal designs and inscription entries<br />
field diaries<br />
<br /><br />
sets info : thumbnails of other objects in that set with title and find number<br />
quick links to other objects of that class, set etc. 
Dig season : <?php echo $find['Find']['season']; ?>

Navigate : <?php echo $find['Find']['display_seq_nbr'];?> -1 <?php echo $find['Find']['display_seq_nbr'];?> + 1<br>

</div>
<?php
/*
$find['Find']['ctgy2_kw_assigned_ind'] => N
$find['Find']['ctgy1_kw_assigned_ind'] => N
$find['Find']['discard_info'] => 
$find['Find']['museum_nm_new'] => IM
$find['Find']['registration_dt_type'] => D
 => 287
$find['Find']['field_obj_type_nbr'] => 
$find['Find'][field_ctlg_sub_nbr] => 

$find['Find'][dig_ctgy_cd] => 
$find['Find'][field_ctlg_nbr] => 0000220
$find['Find'][rmks_exist_ind] => N
$find['Find'][dimen_exists_ind] => N
$find['Find'][notes_exist_ind] => N
$find['Find'][descr_exists_ind] => Y
$find['Find'][prov_qstnbl_ind] => N
$find['Find'][is_inscribed_ind] => N
$find['Find'][is_composite_ind] => N
$find['Find'][materials_qstnbl_ind] => N
$find['Find'][dimen_qstnbl_ind] => N
$find['Find'][site_abbrv_cd] => Ag
*/
?>
<br />
<pre><?php print_r($find); ?></pre>