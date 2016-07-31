<?php
class Find extends AppModel {
public $name = 'Find';
public $useTable = 'find';
public $primaryKey = 'FIND_ID';
public $displayField = 'FDNO';
public $actsAs = array('Containable');
public $order = 'DISPLAY_SEQ_NBR';

public $hasAndBelongsToMany = array(
'ProvInfo' => array(
 'className' => 'ProvInfo',
 'joinTable' => 'find_prov_info',
 'foreignKey' => 'FIND_ID',
 'associationForeignKey' => 'PROV_INFO_ID',
),

'DigitalImg' => array(
 'className' => 'DigitalImg',
 'joinTable' => 'ref_item_assoc',
 'foreignKey' => 'OBJ_ID',
 'associationForeignKey' => 'REF_ITEM_ID',
),

 'Material' => array(
 'className' => 'Material',
 'joinTable' => 'material_find',
 'foreignKey' => 'FIND_ID',
 'associationForeignKey' => 'MATERIAL_ID',

  )
 /* 'Locus' => array(
 'className' => 'Locus',
 'joinTable' => 'diyala_wiki.finds_loci',
 'foreignKey' => 'find_id',
 'associationForeignKey' => 'locus_id'), */

);/*
public $hasMany= array(
 'Notes' => array(
 'className' => 'Note',
 'foreignKey' => 'find_id'
),
 'Remarks' => array(
 'className' => 'Remark',
 'foreignKey' => 'find_id'
),
 'Description' => array(
 'className' => 'Description',
 'foreignKey' => 'find_id'
)
)
;*/
public $hasOne= array(
 'VMFind' => array(
 'className' => 'VMFind',
 'foreignKey' => 'FIND_ID'
),
 'Idb' => array(
 'className' => 'Idb',
 'foreignKey'=>'MUSEUM_REGISTRY_NBR',
 'associatedKey'   => 'MUSEUM_REGISTRY_NBR'
)
);

public $hasMany = array(
	'Citation' => array(
			'className' => 'Citation',
			'foreignKey' => 'OBJ_ID',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''),
  'FindRegistryInfo' => array(
          'className' => 'FindRegistryInfo',
          'foreignKey' => 'FIND_ID',
          'dependent' => false,
          'conditions' => '',
          'fields' => '',
          'order' => '',
          'limit' => '',
          'offset' => '',
          'exclusive' => '',
          'finderQuery' => '',
          'counterQuery' => '')
);

}
