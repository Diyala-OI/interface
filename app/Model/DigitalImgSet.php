<?php
class DigitalImgSet extends AppModel {
public $name = 'DigitalImgSet';
public $useTable = 'ref_item_set';
public $primaryKey = 'ref_item_id';
public $displayField = '';
/*
public $hasAndBelongsToMany = array(
 'DigitalImg' => array(
 'className' => 'DigitalImg',
 'joinTable' => 'ref_item_item_set',
 'foreignKey' => 'img_set_id',
 'associationForeignKey' => 'ref_item_id',
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