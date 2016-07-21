<?php
App::uses('AppModel', 'Model');
class KeywordHierarchy extends AppModel {
public $name = 'KeywordHierarchy';
public $useTable = 'keyword_hierarchy';
public $primaryKey = 'hierarchy_id';


public $hasAndBelongsToMany = array(
 'Find' => array(
 'className' => 'Find',
 'joinTable' => 'keyword_assocn',
 'foreignKey' => 'hierarchy_id',
 'associationForeignKey' => 'obj_id',
)
);
public $hasMany = array(
 'Keyword' => array(
 'className' => 'Keyword',
 'foreignKey' => 'keyword',
 ),
 'SubKeywordHierarchy' => array(
 'className' => 'KeywordHierarchy',
 'foreignKey' => 'parent_hier_id',
 )
		);
	

public $belongsTo = array(
 'KeywordHierarchyParent' => array(
 'className' => 'KeywordHierarchy',
 'foreignKey' => 'parent_hier_id',
 )
 );


}