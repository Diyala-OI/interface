<?php
App::uses('AppModel', 'Model');
class SiteCoord extends AppModel {
  
  public $useDbConfig="wiki";
  
  
public $belongsTo = array(
  
  
  'Site' => array(
		'className' => 'Site',
		'foreignKey' => 'site_abbrv_cd',
		'conditions' => '',
		'fields' => '',
		'order' => ''
	)
      );
}
