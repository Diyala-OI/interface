<?php
class DigitalImg extends AppModel {
public $name = 'DigitalImg';
public $useTable = 'digital_img';
public $primaryKey = 'REF_ITEM_ID';
public $displayField = '';

public $belongsTo = array(
        'RefItem' => array(
        'className'  => 'RefItem',
	'foreignKey' => 'ref_item_id'
        )
    );
public $hasAndBelongsToMany = array(
/* 'DigitalImgSet' => array(
 'className' => 'DigitalImgSet',
 'joinTable' => 'digital_img_img_set',
 'foreignKey' => 'ref_item_id',
 'associationForeignKey' => 'img_set_id',
),*/
 'Find' => array(
 'className' => 'Find',
 'joinTable' => 'ref_item_assoc',
 'foreignKey' =>'REF_ITEM_ID', //current model id in join table
 'associationForeignKey' => 'OBJ_ID', // associating model id in join table
),
    
'LocusCard' => array(
'className' => 'LocusCard',
'joinTable' => 'ref_item_ref_item',
'foreignKey' => 'REF_ITEM_ID_TO',
'associationForeignKey' => 'REF_ITEM_ID_FROM')
 );



public function beforeFind($queryData) {
$queryData['conditions']['RefItem.ref_type_cd'] = "DG";
return $queryData;
}
}