<?php
App::uses('AppModel', 'Model');
class Keyword extends AppModel {
public $name = 'Keyword';
public $useTable = 'keyword';
public $primaryKey = 'keyword';

public $hasOne = array(
 'KeywordCls' => array(
 'className' => 'KeywordCls',
 'foreignKey' => 'kw_cls',
 )
		);

public $hasMany = array(
 'Keyword' => array(
 'className' => 'KeywordHierarchy',
 'foreignKey' => 'kw_cls',
 ),
  'Keyword' => array(
 'className' => 'KeywordHierarchyDescrn',
 'foreignKey' => 'kw_cls',
 )
		);
		
		}