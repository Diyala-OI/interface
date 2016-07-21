<?php

class AreasController extends AppController {
public $helpers = array('Html');

/*
public function index() {  // view all areas
$this->set('areas', $this->Area->find('all',
array(
'fields' => array('site_subdiv_id', 'sq_h_coord', 'sq_v_coord'),
'conditions' => array('site_subdiv_type_cd' => 'AR') // get only area types of subdiv
)
));
}
*/

public function site($site_id=null) { // view areas of one site
$this->set('site', $site_id);

$site_info = $this->Site->find('first', array(
'conditions' => array('Site.site_abbrv_cd' => $site_id)));
$this->set('site_info', $site_info);

// help ! containable !!!
$this->set('areas', $this->Area->find('all',
array(
'fields' => array('site_subdiv_id', 'site_subdiv_nm'),
'conditions' => array('site_abbrv_cd' => $site_id),// get only area types of subdiv
'order' => array('display_seq1_nbr ASC', 'display_seq2_nbr ASC', 'display_seq1_nbr ASC'), //string or array defining order
)
));


}
public function view($id = null) { // view one area, find by its ID
$this->set('colors', $colors = array('#d4aa00', '#008080', '#000080', '#ff0000', '#68e15a','#aa1ac7', '#32b1fd', '#5665d5', '#c9ff11', '#f3a45d', '#68fa35'));
	if (!$id) {
		throw new NotFoundException(__('Invalid area'));
    }
	$area = $this->Area->find($type = 'first',  
	array(
    'conditions' => array(' site_subdiv_id' => $id), //array of conditions
    'contain' => array(
        'Site' => array('SiteCoord', 'fields' => array('SITE_ABBRV_CD','SITE_NM')),
        'AreaMap',
        'ArchLevel' => array('Locus', 'LocusCoord'=> array('Locus'), 'ArchLevelMap', 'order' => array ('DISPLAY_SEQ1_NBR', 'DISPLAY_SEQ2_NBR', 'DISPLAY_SEQ3_NBR')))
    ));
	
	if (!$area) {
		throw new NotFoundException(__('Invalid area'));
		}
	$this->set('area', $area);
	}

	
	
	}