<?php
App::uses('AppModel', 'Model');
class KeywordCls extends AppModel {
public $name = 'KeywordCls';
public $useTable = 'keyword_cls';
public $primaryKey = 'keywordCls';

public $belongsTo = array(
 'Keyword' => array(
 'className' => 'Keyword',
 'foreignKey' => 'kw_cls',
 )
 );

public $hasMany = array(
 'KeywordClsLvlTitle' => array(
 'className' => 'KeywordClsLvlTitle',
 'foreignKey' => 'kw_cls',
 )	);
		
		
		}