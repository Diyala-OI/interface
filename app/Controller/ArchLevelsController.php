<?php

class ArchLevelsController extends AppController {
public $helpers = array('Html');

public function index() {
$this->set('arch_levels', $this->ArchLevel->find('all'));
}

public function view($id = null) {
	if (!$id) {
		throw new NotFoundException(__('Invalid ArchLevel'));
    }

	$arch_level = $this->ArchLevel->findByLevel_id($id);
	if (!$arch_level) {
		throw new NotFoundException(__('Invalid ArchLevel'));
		}
	$this->set('arch_level', $arch_level);
	}

	
	
	}
	
	/*
	
'55164',  'Sin I, below'
'55167', 'Sin III or IV'
'55168',  'Sin IV'
'55171',  'Sin IX-X'
'55173',  'Sin V and above'
'55175',  'Sin VI or VII'
'55176',  'Sin VI-VII'
'55177',  'Sin VII'
'55179',  'Sin VIII-IX'

	*/