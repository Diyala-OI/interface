<?php
App::uses('AppModel', 'Model');
 
class LocusCoord extends AppModel {
public $useDbConfig="wiki";

public $belongsTo = array(
		'ArchLevel' => array(
			'className' => 'ArchLevel',
			'foreignKey' => 'level_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Locus' => array(
			'className' => 'Locus',
			'foreignKey' => 'site_subdiv_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


}
