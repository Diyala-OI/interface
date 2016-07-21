<?php
App::uses('AppModel', 'Model');
class AuthorTitle extends AppModel {
public $useDbConfig="wiki";
public $hasOne = array(
        'Author' => array(
            'className' => 'Author',
            'foreignKey' => 'author_id'
        )
    );
}
