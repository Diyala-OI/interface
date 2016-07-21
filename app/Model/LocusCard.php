<?php
class LocusCard extends AppModel {
public $name = 'LocusCard';
public $useTable = 'locus_card';
public $primaryKey = 'REF_ITEM_ID';
public $displayField = '';

public $hasAndBelongsToMany = array(
'Locus' => array(
'className' => 'Locus',
'foreignKey' => 'REF_ITEM_ID',
'joinTable' => 'ref_item_assoc',
'associationForeignKey' => 'OBJ_ID'),

'DigitalImg' => array(
'className' => 'DigitalImg',
'joinTable' => 'ref_item_ref_item',
'foreignKey' => 'REF_ITEM_ID_FROM',
'associationForeignKey' => 'REF_ITEM_ID_TO'

//'foreignKey' =>'REF_ITEM_ID', //current model id in join table
// 'associationForeignKey' => 'OBJ_ID', // associating model id in join table
)
);

}
