<?php
App::uses('Locus','DirectoryInfo');
class Locus extends AppModel {
public $name = 'Locus';
public $useTable = 'loci';
public $primaryKey = 'id';
public $displayField = 'LOCUS_NBR';
public $useDbConfig="wiki";

 public $hasAndBelongsToMany = array(
        'ArchLevel' =>
            array(
                'className' => 'ArchLevel',
                'joinTable' => 'locus_coords',
                'foreignKey' => 'site_subdiv_id',
                'associationForeignKey' => 'level_id',
                'unique' => true,
                'conditions' => '',
                'fields' => '',
                'order' => '',
                'limit' => '',
                'offset' => '',
                'finderQuery' => '',
                'with' => 'LocusCoord'
            ),
 'Find' => array(
 'className' => 'Find',
 'joinTable' => 'finds_loci',
 'foreignKey' => 'locus_id',
 'associationForeignKey' => 'find_id'),

'LocusCard' => array(
 'className' => 'LocusCard',
 'foreignKey' => 'OBJ_ID',
 'joinTable' => 'ref_item_assoc',
 'associationForeignKey' => 'REF_ITEM_ID'),

 'DigitalImg' => array(
 'className' => 'DigitalImg',
 'foreignKey' => 'OBJ_ID',
 'joinTable' => 'ref_item_assoc',
 'associationForeignKey' => 'REF_ITEM_ID'),
   );

public $hasMany = array(
		'LocusCoord' => array(
			'className' => 'LocusCoord',
			'foreignKey' => 'SITE_SUBDIV_ID',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''),
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
			'counterQuery' => '')
);

}
