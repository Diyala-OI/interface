<?php
class FindRegistryInfo extends AppModel {
public $name = 'FindRegistryInfo';
public $useTable = 'find_registry_info';
public $primaryKey = 'FIND_ID';
public $displayField = '';

public $belongsTo = array(
        'Find' => array(
        'className'  => 'Find',
	'foreignKey' => 'FIND_ID'
        )
    );


                }
