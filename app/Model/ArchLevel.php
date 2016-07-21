<?php
App::uses('AppModel', 'Model');
 
class ArchLevel extends AppModel {

public $useTable = 'arch_levels';
public $primaryKey = 'id';
public $useDbConfig="wiki";
public $order = array('DISPLAY_SEQ1_NBR', 'DISPLAY_SEQ2_NBR', 'DISPLAY_SEQ3_NBR');

public $hasAndBelongsToMany = array(
        'Locus' =>
            array(
                'className' => 'Locus',
                'joinTable' => 'locus_coords',
                'foreignKey' => 'level_id',
                'associationForeignKey' => 'site_subdiv_id',
                'unique' => true,
                'conditions' => '',
                'fields' => '',
                'order' => '',
                'limit' => '',
                'offset' => '',
                'finderQuery' => '',
                'with' => 'LocusCoord'
            )
    );

public $belongsTo = array (
		'Site' => array(
			'className' => 'Site',
			'foreignKey' => 'SITE_ABBRV_CD',
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
		'Area' => array(
			'className' => 'Area',
			'foreignKey' => 'SITE_SUBDIV_ID',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		));

public $hasOne = array(
		'ArchLevelMap' => array(
			'className' => 'ArchLevelMap',
			'foreignKey' => 'id',
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
public $hasMany= array(
		'LocusCoord' => array(
			'className' => 'LocusCoord',
			'foreignKey' => 'level_id'
		  ));
		
function beforeFind($query)
{
    $conditions = $query['conditions'];

    if (!is_array($conditions)) {
        if (!$conditions) {
            $conditions = array();
        } else {
            $conditions = array($conditions);
        }
    }

    if (!isset($conditions['SITE_SUBDIV_TYPE_CD']) && !isset($conditions[$this->alias . '.SITE_SUBDIV_TYPE_CD'])) {
        $conditions[$this->alias . '.SITE_SUBDIV_TYPE_CD'] = 'AR';
    }
$query['conditions'] = $conditions;
    return true;
}
		
		
}
