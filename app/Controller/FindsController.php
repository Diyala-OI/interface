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
/*print_r($idbs);
foreach ($idbs as $idb):
$arranged_idbs[$idb['MUSEUM_REGISTRY_NBR']] = $idb['idb_id'];
endforeach; */
$this->set('idbs', $idbs);
}


public function view($find_id = null) {
if(!$find_id){
  throw new NotFoundException(__('Invalid find'));
  }
$find= $this->Find->find('first', array(
 'recursive' => 2,
 'conditions' => array('Find.FIND_ID' => $find_id),
  'contain' => array ('Citation', 'DigitalImg', 'Material','ProvInfo', 'VMFind', 'FindRegistryInfo')
	));
$this->set('find', $find);


$this->loadModel('DirectoryInfo');
$dirs = $this->DirectoryInfo->find('all');
//$this->set('dirs', $dirs);
foreach ($dirs as $dir):
$arranged_dirs[$dir['DirectoryInfo']['DIRECTORY_NAME']] = $dir['DirectoryInfo']['DIRECTORY_PATH'];
endforeach;
$this->set('dirs', $arranged_dirs);





$i=0;
print_r($find);
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
}
}
}
}
$this->set('material', $new_material);
/*

foreach ($find['SiteSubdiv'] as $subdiv){
	if ($subdiv['site_subdiv_type_cd']=='GS'){
	$new_subdiv['site']=$subdiv;
}}

foreach ($find['SiteSubdiv'] as $subdiv){
	if ($subdiv['site_subdiv_type_cd']=='AR'){
	$new_subdiv['area']=$subdiv;
}}

foreach ($find['SiteSubdiv'] as $subdiv){
	if ($subdiv['site_subdiv_type_cd']=='AL'){
	$new_subdiv['arch_level']=$subdiv;
}}

foreach ($find['SiteSubdiv'] as $subdiv){
	if ($subdiv['site_subdiv_type_cd']=='LO'){
	$new_subdiv['locus']=$subdiv;
}}

foreach ($find['SiteSubdiv'] as $subdiv){
	if ($subdiv['site_subdiv_type_cd']=='GS'){
	$new_subdiv['grid_square']=$subdiv;
}}
foreach ($find['SiteSubdiv'] as $subdiv){
	if ($subdiv['site_subdiv_type_cd']=='FE'){
	$new_subdiv['feature']=$subdiv;
}}

$this->set('subdiv', $new_subdiv);

/*
[ref_item_id] //=> 1196434
[capture_dt] //=> 2008-06-19 11:09:00
[img_mime_cd] //=> image/jpeg
[img_title] //=> Object Image
[img_directory_obj] //=> DIYALA_AGRAB01
[digital_img_set_id] //=>
[img_file_nm] //=> ag0133_02.jpg





$find = $this->Find->find('first', array(
'contain' => array(
	'Material',
	'RefItem'=> array(
		'DigitalImage' => array(
    'conditions' => array('RefItem.ref_type_cd LIKE' => '%DG%')
    ),
		'RelatedRefItem' => array(
			'DigitalImage' => array(
                'conditions' => array('RefItem.ref_type_cd LIKE' => '%DG%')
            ),
		),
	),
	'ProvInfo'
 )
)
);
*/
/*
        'Profile',
        'Account' => array(
            'AccountSummary'
        ),
        'Post' => array(
            'PostAttachment' => array(
                'fields' => array('id', 'name'),
                'PostAttachmentHistory' => array(
                    'HistoryNotes' => array(
                        'fields' => array('id', 'note')
                    )
                )
            ),
            'Tag' => array(
                'conditions' => array('Tag.name LIKE' => '%happy%')
            )
        )
    )
));



*/



/*
foreach ($find[RefItem] as $key=>$value){
if ($find['RefItem'][$key]['ref_type_cd']=='DG')
{
$img['img_title']=$find['RefItem']['DigitalImg']['img_title'];
$img['bfile_locn']=$find['RefItem']['DigitalImg']['ibfile_locn'];
$img['img_file_nm']=$find['RefItem']['DigitalImg']['img_file_nm'];
$img['img_directory_obj']=$find['RefItem']['DigitalImg']['img_directory_obj'];
$img['img_locn']=$find['RefItem']['DigitalImg']['img_locn'];
$objImgs = $objImg, $img;
}}
	$this->set('objImgs', $objImgs);
	*/
//	$this->set('find', $find);



	}

}
