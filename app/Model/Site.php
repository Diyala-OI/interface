<?php
App::uses('AppModel', 'Model');
class Site extends AppModel {
public $name = 'Site';
public $useTable = 'site';
public $primaryKey = 'SITE_ABBRV_CD';
public $displayField = 'SITE_NM';


public $hasOne = array(
    'SiteCoord' => array(
	'className' => 'SiteCoord',
	'foreignKey' => 'site_id',
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
 'Area' => array(
 'className' => 'Area',
 'foreignKey' => 'SITE_ABBRV_CD'
));	
	
}