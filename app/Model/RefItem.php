<?php
App::uses('AppModel', 'Model');
class RefItem extends AppModel {
public $name = 'RefItem';
public $useTable = 'ref_item';
public $primaryKey = 'ref_item_id';
public $displayField = 'context';
//public $order = array("Material.display_seq1" => "asc", "Material.display_seq2" => "asc", "Material.display_seq1" => "asc");

public $hasAndBelongsToMany = array(
 'Find' => array(
 'className' => 'Find',
 'joinTable' => 'ref_item_assoc',
 //'conditions' => 'ref_item_assoc.obj_table_cd="FI"',
 'foreignKey' => 'ref_item_id',
 'associationForeignKey' => 'obj_id',
),
 'RelatedRefItem' => array(
 'className' => 'RefItem',
 'joinTable' => 'ref_item_ref_item',
 //'conditions' => 'ref_item_assoc.obj_table_cd="FI"',
 'foreignKey' => 'ref_item_id_from',
 'associationForeignKey' => 'ref_item_id_to',
)
		);
		

public $hasOne = array(
		'DiyalaPerson' => array(
			'className' => 'DiyalaPerson',
			'foreignKey' => 'ref_item_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Drawing' => array(
			'className' => 'Drawing',
			'foreignKey' => 'ref_item_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'TypeInfo' => array(
			'className' => 'TypeInfo',
			'foreignKey' => 'ref_item_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'PotteryProfileSet' => array(
			'className' => 'PotteryProfileSet',
			'foreignKey' => 'ref_item_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'LocusCard' => array(
			'className' => 'LocusCard',
			'foreignKey' => 'ref_item_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'FieldRegister' => array(
			'className' => 'FieldRegister',
			'foreignKey' => 'ref_item_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'FieldDiary' => array(
			'className' => 'FieldDiary',
			'foreignKey' => 'ref_item_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'GraveCard' => array(
			'className' => 'GraveCard',
			'foreignKey' => 'ref_item_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	      'ObjCard' => array(
			'className' => 'ObjCard',
			'foreignKey' => 'ref_item_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'HoardCard' => array(
			'className' => 'HoardCard',
			'foreignKey' => 'ref_item_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),/*
				'TabletTransliteration' => array(
			'className' => 'TabletTransliteration',
			'foreignKey' => 'ref_item_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),*/
				'Section' => array(
			'className' => 'Section',
			'foreignKey' => 'ref_item_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
/*				'Map' => array(
			'className' => 'Map',
			'foreignKey' => 'ref_item_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),*/
				'Publication' => array(
			'className' => 'Publication',
			'foreignKey' => 'ref_item_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
				'DigitalImg' => array(
			'className' => 'DigitalImg',
			'foreignKey' => 'ref_item_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
				'PhotoPrint' => array(
			'className' => 'PhotoPrint',
			'foreignKey' => 'ref_item_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
				'PhotoNeg' => array(
			'className' => 'PhotoNeg',
			'foreignKey' => 'ref_item_id',
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

		
public function beforeFind($queryData) {
$queryData['conditions']['ref_item_assoc.obj_table_cd'] = "FI";
return $queryData;
}
		
		}