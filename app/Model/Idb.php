<?php
App::uses('AppModel', 'Model');
class Idb extends AppModel {
public $useDbConfig="wiki";
public $name = 'Idb';
public $useTable = 'idbs';

public $hasOne = array(
		'Find' => array(
		'foreignKey' => 'MUSEUM_REGISTRY_NBR',
		 'associatedKey'   => 'MUSEUM_REGISTRY_NBR'
		)
			);


}