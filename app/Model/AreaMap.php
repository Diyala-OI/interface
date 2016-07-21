<?php
App::uses('AppModel', 'Model');

class AreaMap extends AppModel {
public $useDbConfig="wiki";

	public $hasOne = array(
		'Area' => array(
			'className' => 'Area',
			'foreignKey' => 'SITE_SUBDIV_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
