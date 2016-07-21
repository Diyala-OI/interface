<?php
App::uses('AppModel', 'Model');
 
class ArchLevelCoord extends AppModel {
public $useDbConfig="wiki";

	public $belongsTo = array(
		'ArchLevel' => array(
			'className' => 'ArchLevel',
			'foreignKey' => 'site_subdiv_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
