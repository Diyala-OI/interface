<?php
class SitesController extends AppController {
public $helpers = array('Html');
public $uses = array('Area','Site', 'AreaCoord');

public function index() {
$this->set('sites', $this->Site->find('all', array('fields' => array('site_abbrv_cd', 'site_nm'))));
$this->set('title', 'Diyala Sites');
}

public function view($site_id=null) { // view areas of one site
$this->set('site', $site_id);
$this->set('colors', $colors = array('#d4aa00', '#008080', '#000080', '#ff0000', '#68e15a','#aa1ac7', '#32b1fd', '#5665d5', '#c9ff11', '#f3a45d', '#68fa35'));
$site_info = $this->Site->find('first', array(
'fields' => array('site_abbrv_cd','cmts_id', 'site_nm'),
'conditions' => array('Site.site_abbrv_cd' => $site_id)));
$this->set('site_info', $site_info);

$this->set('areas', $this->Area->find('all',
array(
'fields' => array('site_subdiv_id', 'site_subdiv_nm', 'site_subdiv_type_cd'),
'conditions' => array('site_subdiv_type_cd' => 'AR','Area.site_abbrv_cd' => $site_id),// get only area types of subdiv
'order' => array('display_seq1_nbr ASC', 'display_seq2_nbr ASC', 'display_seq1_nbr ASC'), //string or array defining order
)));
$this->set('title','Areas of '. $site_info['Site']['site_nm']); 
}
}
