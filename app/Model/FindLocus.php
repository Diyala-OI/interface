<?php
class Locus extends AppModel {
public $name = 'FindsLoci';
public $useTable = 'finds_loci';
public $useDbConfig="wiki";
/*
public $hasMany = array(
		'Locus' => array(
			'className' => 'Locus',
			'foreignKey' => 'locus_id',
),
		'Find' => array(
			'className' => 'Find',
			'foreignKey' => 'find_id')
);*/

}

