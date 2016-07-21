<?php
App::uses('AppModel', 'Model');
class VMFind extends AppModel {
public $name = 'VMFind';
public $useTable = 'vm_find';
public $primaryKey = 'FIND_ID';


public $belongsTo = 'Find';
}