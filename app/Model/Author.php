<?php
App::uses('AppModel', 'Model');

class Author extends AppModel {
public $useDbConfig="wiki";
public $displayField = 'last_name';
public $belongsTo = array('AuthorTitle');

	public $hasAndBelongsToMany = array(
		'WikiArticle' => array(
			'className' => 'WikiArticle',
			'joinTable' => 'authors_wiki_articles',
			'foreignKey' => 'author_id',
			'associationForeignKey' => 'wiki_article_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => 'order',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
}
