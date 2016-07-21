<?php
class FieldRegister extends AppModel {
public $name = 'FieldRegister';
public $useTable = 'field_register';
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
		
		/*
     'classt' =>
            array(
                'className'              => 'Ingredient',
                'joinTable'              => 'ingredients_recipes',
                'foreignKey'             => 'recipe_id',
                'associationForeignKey'  => 'ingredient_id',
                'unique'                 => true,
                'conditions'             => '',
                'fields'                 => '',
                'order'                  => '',
                'limit'                  => '',
                'offset'                 => '',
                'finderQuery'            => '',
                'deleteQuery'            => '',
                'insertQuery'            => ''
            )
    );
	*/	
	
		public function beforeFind($queryData) {
$queryData['conditions']['RefItem.ref_type_cd'] = "FT";
return $queryData;
}

}