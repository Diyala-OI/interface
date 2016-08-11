<?php
App::uses('AppModel', 'Model');
class Material extends AppModel {
public $name = 'Material';
public $useTable = 'material';
public $primaryKey = 'MATERIAL_ID';
public $displayField = 'MATERIAL_DESCR';


public $hasAndBelongsToMany = array(
 'Find' => array(
 'className' => 'Find',
 'joinTable' => 'material_find',
 'foreignKey' => 'MATERIAL_ID',
 'associationForeignKey' => 'FIND_ID',
));


}
