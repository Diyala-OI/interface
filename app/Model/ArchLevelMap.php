<?php
App::uses('AppModel', 'Model');
 
class ArchLevelMap extends AppModel {
public $useDbConfig="wiki";


public $hasOne = array(
		'ArchLevel' => array(
			'className' => 'ArchLevel',
			'foreignKey' => 'id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
