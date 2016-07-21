<?php
App::uses('AppModel', 'Model');
class SiteSubdiv extends AppModel {
public $name = 'SiteSubdiv';
public $useTable = 'site_subdiv';
public $primaryKey = 'SITE_SUBDIV_ID';
public $displayField = 'SITE_SUBDIV_NM';
public $order = array("SiteSubdiv.DISPLAY_SEQ1_NBR" => "asc", "SiteSubdiv.DISPLAY_SEQ2_NBR" => "asc", "SiteSubdiv.DISPLAY_SEQ3_NBR" => "asc");


public $hasAndBelongsToMany = array(
 'Find' => array(
 'className' => 'Find',
 'joinTable' => 'find_site_subdiv',
 'foreignKey' => 'SITE_SUBDIV_ID',
 'associationForeignKey' => 'FIND_ID',
),

 'ArchPeriod' => array(
 'className' => 'ArchPeriod',
 'joinTable' => 'period_site_subdiv',
 'foreignKey' => 'SITE_SUBDIV_ID',
 'associationForeignKey' => 'PERIOD_ID',
)
		
		);
		

}