<?php
App::uses('AppModel', 'Model');
 
class Area extends AppModel {

public $useTable = 'site_subdiv';
public $primaryKey = 'SITE_SUBDIV_ID';
public $order = array('DISPLAY_SEQ1_NBR', 'DISPLAY_SEQ2_NBR', 'DISPLAY_SEQ3_NBR');
public $actsAs = array('Containable');


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
		));

public $hasOne = array(
		'AreaCoord' => array(
			'className' => 'AreaCoord',
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
		),
		'AreaMap' => array(
			'className' => 'AreaMap',
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
,
);		
		
public $hasMany= array(
 'Locus' => array(
 'className' => 'Locus',
 'foreignKey' => 'SITE_SUBDIV_ID'
),
'ArchLevel' => array(
 'className' => 'ArchLevel',
 'foreignKey' => 'SITE_SUBDIV_ID'
)

);
/*		
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
*/		
		
}
