<?php
App::uses('AppModel', 'Model');
/**
 * AuthorsWikiArticle Model
 *
 * @property WikiArticle $WikiArticle
 * @property Author $Author
 */
class AuthorsWikiArticle extends AppModel {
public $useDbConfig="wiki";

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'WikiArticle' => array(
			'className' => 'WikiArticle',
			'foreignKey' => 'wiki_article_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Author' => array(
			'className' => 'Author',
			'foreignKey' => 'author_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
