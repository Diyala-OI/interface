<?php
class FindsController extends AppController {
public $helpers = array('Html');
public $actsAs = array ('containable'/*'Searchable'*/);
public $components = array('RequestHandler'/*, 'Search'*/, 'Filter.Filter');

public function index() {
$this->set('finds', $this->Find->find('all', array('limit' => 50,
'fields' => array('FIND_ID', 'FDNO', 'SEASON'),
'contain' => array('Citation', 'DigitalImg', 'Material','ProvInfo', 'VMFind', 'FindRegistryInfo')
)));

$this->loadModel('DirectoryInfo');
$dirs = $this->DirectoryInfo->find('all');
//$this->set('dirs', $dirs);
foreach ($dirs as $dir):
$arranged_dirs[$dir['DirectoryInfo']['DIRECTORY_NAME']] = $dir['DirectoryInfo']['DIRECTORY_PATH'];
endforeach;
$this->set('dirs', $arranged_dirs);
$this->loadModel('Idb');
$idbs = $this->Idb->find('all');
$this->set('idbs', $idbs);
}

public function view($find_id = null) {
if(!$find_id){
  throw new NotFoundException(__('Invalid find'));
  }
$find= $this->Find->find('first', array(
 'conditions' => array('Find.FIND_ID' => $find_id),
 'recursive' => 5,
  'contain' => array (/*'Keyword',*/ 'Citation', 'DigitalImg', 'Material','ProvInfo', 'VMFind', 'FindRegistryInfo', 'SiteSubdiv'/*'Locus' => array('ArchLevel')*/)
	));
$this->set('find', $find);


// Grab directories to display images
$this->loadModel('DirectoryInfo');
$dirs = $this->DirectoryInfo->find('all');
//$this->set('dirs', $dirs);
foreach ($dirs as $dir):
$arranged_dirs[$dir['DirectoryInfo']['DIRECTORY_NAME']] = $dir['DirectoryInfo']['DIRECTORY_PATH'];
endforeach;
$this->set('dirs', $arranged_dirs);


// arrange materials in order
$i=0;
$new_material='';
$key = 'MATERIAL_DESCR';
$bad = array(
    'unknown',
    'uncertain',
		''
);
foreach ($find['Material'] as $material){
	if ($material['LVL_NBR']==1){
	$new_material[$i]['material1']=$material;
	$i++;
}}
foreach ($find['Material'] as $material){
	  if ($material['LVL_NBR']==2){
		foreach ($new_material as $key => $material_item){ // roll through lvl 1 materials
			if ($material_item['material1']['MATERIAL_CD'] == $material['PARENT_MATERIAL_CD']){ // check cd
			$new_material[$key]['material2']=$material;
}}}}
$this->set('material', $new_material);

$mat='';
if ((!empty($material[0]['material3'])) && (!in_array($material[0]['material3'][$key],$bad))){
$mat= $material[0]['material3'][$key];
}
elseif ((!empty($material[0]['material2'])) && (!in_array($material[0]['material2'][$key],$bad))){
$mat= $material[0]['material2'][$key];
}
elseif ((!empty($material[0]['material1'])) && (!in_array($material[0]['material1'][$key],$bad))){
$mat= $material[0]['material1'][$key];
}

unset($key, $bad);

if ($find['VMFind']['DESCRN_1']!=null){

$desc= $find['VMFind']['DESCRN_1'];
}
else{
$desc= $find['VMFind']['DESCR1'];
}

if (empty($mat)&& empty($desc)){$mat = 'object';}
$title = $find['Find']['FDNO'].': '.$find['Find']['COLOR'].' '.$mat. '  '.$desc;
$this->set('title', $title);



foreach ($find['SiteSubdiv'] as $subdiv){
	if ($subdiv['SITE_SUBDIV_TYPE_CD']=='GS'){
	$new_subdiv['site']=$subdiv;
}}

foreach ($find['SiteSubdiv'] as $subdiv){
	if ($subdiv['SITE_SUBDIV_TYPE_CD']=='AR'){
	$new_subdiv['area']=$subdiv;
}}

foreach ($find['SiteSubdiv'] as $subdiv){
	if ($subdiv['SITE_SUBDIV_TYPE_CD']=='AL'){
	$new_subdiv['arch_level']=$subdiv;
}}

foreach ($find['SiteSubdiv'] as $subdiv){
	if ($subdiv['SITE_SUBDIV_TYPE_CD']=='LO'){
	$new_subdiv['locus']=$subdiv;
}}

foreach ($find['SiteSubdiv'] as $subdiv){
	if ($subdiv['SITE_SUBDIV_TYPE_CD']=='GS'){
	$new_subdiv['grid_square']=$subdiv;
}}
foreach ($find['SiteSubdiv'] as $subdiv){
	if ($subdiv['SITE_SUBDIV_TYPE_CD']=='FE'){
	$new_subdiv['feature']=$subdiv;
}}

$this->set('subdiv', $new_subdiv);

	}

}
