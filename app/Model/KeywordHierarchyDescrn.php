<?php
App::uses('AppModel', 'Model');
class KeywordHierarchyDescrn extends AppModel {
public $name = 'KeywordHierarchyDescrn';
public $useTable = 'keyword_hierarchy_descrn';
public $primaryKey = 'hierarchy_id';

public $hasAndBelongsToMany = array(
 'Find' => array(
 'className' => 'Find',
 'joinTable' => 'keyword_assocn_descrn',
 'foreignKey' => 'hierarchy_id',
 'associationForeignKey' => 'obj_id'
)
);

public $hasMany = array(
 'Keyword' => array(
 'className' => 'Keyword',
 'foreignKey' => 'keyword',
 ),
 'SubKeywordHierarchyDescrn' => array(
 'className' => 'KeywordHierarchyDescrn',
 'foreignKey' => 'parent_hier_id'
 )
);
	

public $belongsTo = array(
 'KeywordHierarchyParentDescrn' => array(
 'className' => 'KeywordHierarchyDescrn',
 'foreignKey' => 'parent_hier_id'
 )
);
		

		
		
		/*
		
		function beforeFind(&$queryData)
{
    $conditions = $queryData['conditions'];

    if (!is_array($conditions)) {
        if (!$conditions) {
            $conditions = array();
        } else {
            $conditions = array($conditions);
        }
    }

    if (!isset($conditions['active']) && !isset($conditions[$this->alias . '.active'])) {
        $conditions[$this->alias . '.active'] = 1;
    }

    return true;
}


*/
		
		
}