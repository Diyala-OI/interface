<?php
App::uses('AppModel', 'Model');

class AreaCoord extends AppModel {
public $useDbConfig="wiki";

	public $belongsTo = array(
		'Area' => array(
			'className' => 'Area',
			'foreignKey' => 'SITE_SUBDIV_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
