<?php
App::uses('AppModel', 'Model');
class ProvInfo extends AppModel {
public $name = 'ProvInfo';
public $useTable = 'prov_info';
public $primaryKey = 'PROV_INFO_ID';
public $displayField = 'CONTEXT';
//public $order = array("Material.display_seq1" => "asc", "Material.display_seq2" => "asc", "Material.display_seq1" => "asc");

public $hasAndBelongsToMany = array(
 'Find' => array(
 'className' => 'Find',
 'joinTable' => 'find_prov_info',
 'foreignKey' => 'PROV_INFO_ID',
 'associationForeignKey' => 'FIND_ID',
)
		);
		

}