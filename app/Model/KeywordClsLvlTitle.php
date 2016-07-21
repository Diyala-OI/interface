<?php
App::uses('AppModel', 'Model');
class KeywordClsLvlTitle extends AppModel {
public $name = 'KeywordClsLvlTitle';
public $useTable = 'Keyword_cls_lvl_title';
public $primaryKey = 'kw_cls';

public $belongsTo = array(
 'KeywordCls' => array(
 'className' => 'KeywordCls',
 'foreignKey' => 'kw_cls',
 )
		);
}