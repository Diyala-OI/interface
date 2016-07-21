<?php
class ArchPeriod extends AppModel {
public $name = 'ArchPeriod';
public $useTable = 'arch_period';
public $primaryKey = 'period_id';
public $displayField = 'period_nm';


public $hasAndBelongsToMany = array(
 'SiteSubdiv' => array(
 'className' => 'SiteSubdiv',
 'joinTable' => 'period_site_subdiv',
 'foreignKey' => 'period_id',
 'associationForeignKey' => 'site_subdiv_id',
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