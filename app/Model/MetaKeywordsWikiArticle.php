<?php
App::uses('AppModel', 'Model');
/**
 * MetaKeywordsWikiArticle Model
 *
 * @property MetaKeyword $MetaKeyword
 * @property WikiArticle $WikiArticle
 */
class MetaKeywordsWikiArticle extends AppModel {
public $useDbConfig="wiki";

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'MetaKeyword' => array(
			'className' => 'MetaKeyword',
			'foreignKey' => 'meta_keyword_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'WikiArticle' => array(
			'className' => 'WikiArticle',
			'foreignKey' => 'wiki_article_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
