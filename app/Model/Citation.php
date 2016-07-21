<?php
class Citation extends AppModel {
public $name = 'Citation';
public $useTable = 'citation';
public $primaryKey = 'OBJ_ID';
public $displayField = '';

public $hasOne = array(
        'Publication' => array(
        'className'  => 'Publication',
	'foreignKey' => 'REF_ITEM_ID'
        )
    );
		
public $belongsTo = array(
        'Locus' => array(
        'className'  => 'Locus',
	'foreignKey' => 'OBJ_ID'
        ),
         'ArchLevel' => array(
        'className'  => 'ArchLevel',
	'foreignKey' => 'OBJ_ID'
        ),
         'Area' => array(
        'className'  => 'Area',
	'foreignKey' => 'OBJ_ID'
        ),
        'Find' => array(
        'className'  => 'Find',
	'foreignKey' => 'OBJ_ID'
        ),
    );
     
                
                }