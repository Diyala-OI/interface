<?php
class PhotoPrint extends AppModel {
public $name = 'PhotoPrint';
public $useTable = 'photo_print';
public $primaryKey = 'item_ref_id';
public $displayField = '';


/* public $belongsTo = array(
        'MyRecipe' => array(
            'className'  => 'Recipe',
        )
    );
*/
public $belongsTo = array(
        'RefItem' => array(
        'className'  => 'RefItem',
				'foreignKey' => 'ref_item_id'
        )
    );
	
public function beforeFind($queryData) {
$queryData['conditions']['RefItem.ref_type_cd'] = "FP";
return $queryData;
}
}