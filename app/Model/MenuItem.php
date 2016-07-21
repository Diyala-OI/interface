<?php
App::uses('AppModel', 'Model');
/**
 * MenuItem Model
 *
 * @property MenuItem $ParentMenuItem
 * @property MenuItem $ChildMenuItem
 */
class MenuItem extends AppModel {
public $name = 'MenuItem';
public $useDbConfig="wiki";
public $actsAs = array('Tree');

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ParentMenuItem' => array(
			'className' => 'MenuItem',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ChildMenuItem' => array(
			'className' => 'MenuItem',
			'foreignKey' => 'parent_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
