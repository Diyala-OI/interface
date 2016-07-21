<?php
App::uses('AppModel', 'Material');
class Remark extends AppModel {
public $name = 'Remark';
public $useTable = 'mv_remarks';
public $primaryKey = 'FIND_ID';
public $displayField = 'description';


public $BelongsTo = array(
 'Find' => array(
 'className' => 'Find',
 'foreignKey' => 'FIND_ID',
)
		);
		

}