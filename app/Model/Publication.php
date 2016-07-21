<?php
class Publication extends AppModel {
public $name = 'Publication';
public $useTable = 'publication';
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
public $hasMany = array(
        'Citations' => array(
        'className'  => 'Citations',
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
}