<?php
App::uses('AppModel', 'Model');
class WikiArticle extends AppModel {
public $useDbConfig="wiki";
public $useTable = 'wiki_articles';
public $actsAs = array('Search.Searchable', 'Tree');
public $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            )
        )
    );		
		
		
public $belongsTo = array(
		'ParentWikiArticle' => array(
			'className' => 'WikiArticle',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

public $hasMany = array(
		'ChildWikiArticle' => array(
			'className' => 'WikiArticle',
			'foreignKey' => 'parent_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

public $hasAndBelongsToMany = array(
 'Author' => array(
 'className' => 'Author',
 'joinTable' => 'authors_wiki_articles',
 'foreignKey' => 'wiki_article_id',
 'associationForeignKey' => 'author_id'
)
 );
	
public function getAllWikiArticle() {
        if (($wiki_articles = Cache::read('getAllWikiArticles_')) === false) {
            $conditions = array();
           $wiki_articles = $this->find('all', array('conditions' => $conditions,
                'fields' => array('WikiArticle.id', 'WikiArticle.parent_id', 'WikiArticle.title', 'WikiArticle.published', 'WikiArticle.url'),
                'order' => array('WikiArticle.lft' => 'ASC')
                    ));
            Cache::write('getAllWikiArticle_', $wiki_articles);
        }
        return $wiki_articles;
    }

public function afterSave($created, $options = array()) { 
parent::afterSave($created, $options);
        Cache::clear();
        clearCache();
    }

public function afterDelete() {
        parent::afterDelete();

        Cache::clear();
        clearCache();
    }

    public function _generateTreeList() {
        if (($wiki_articles = Cache::read('GenerateTreeList')) === false) {
            $conditions = null;
            $wiki_articles = $this->generateTreeList($conditions);
            Cache::write('GenerateTreeList' . null, $wiki_articles);
        }
        return $wiki_articles;
    }

 public $filterArgs = array(
        'title' => array(
            'type' => 'like'
        ),
        'status' => array(
            'type' => 'value'
        ),
        'blog_id' => array(
            'type' => 'lookup',
            'formField' => 'blog_input',
            'modelField' => 'title',
            'model' => 'Blog'
        ),
        'search' => array(
            'type' => 'like',
            'field' => 'Article.description'
        ),
        'tags' => array(
            'type' => 'subquery',
            'method' => 'findByTags',
            'field' => 'Article.id'
        ),
        'filter' => array(
            'type' => 'query',
            'method' => 'orConditions'
        ),
        'enhanced_search' => array(
            'type' => 'like',
            'encode' => true,
            'before' => false,
            'after' => false,
            'field' => array(
                'ThisModel.name', 'OtherModel.name'
            )
        )
    );

    public function findByTags($data = array()) {
        $this->Tagged->Behaviors->attach('Containable', array(
                'autoFields' => false
            )
        );

        $this->Tagged->Behaviors->attach('Search.Searchable');
        $query = $this->Tagged->getQuery('all', array(
            'conditions' => array(
                'Tag.name' => $data['tags']
            ),
            'fields' => array(
                'foreign_key'
            ),
            'contain' => array(
                'Tag'
            )
        ));
        return $query;
    }

    // Or conditions with like
    public function orConditions($data = array()) {
        $filter = $data['filter'];
        $condition = array(
            'OR' => array(
                $this->alias . '.title LIKE' => '%' . $filter . '%',
                $this->alias . '.body LIKE' => '%' . $filter . '%',
            )
        );
        return $condition;
    }

//function beforeFind($queryData){
//App::uses('CakeSession', 'Model/Datasource');
//if (!$this->Auth->loggedIn()){
//	$data['conditions']['WikiArticle.published'] = 1;
//	parent::beforeFind($queryData);
//	}
//}

}

