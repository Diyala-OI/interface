<?php
App::uses('AppModel', 'Model');
/**
 * MetaKeyword Model
 *
 * @property WikiArticle $WikiArticle
 */
class MetaKeyword extends AppModel {
public $useDbConfig="wiki";

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'WikiArticle' => array(
			'className' => 'WikiArticle',
			'joinTable' => 'meta_keywords_wiki_articles',
			'foreignKey' => 'meta_keyword_id',
			'associationForeignKey' => 'wiki_article_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
