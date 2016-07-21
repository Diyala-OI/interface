<?php

class LociController extends AppController {
public $helpers = array('Html');
public $actsAs = array ('containable'/*'Searchable'*/); 
public $components = array('RequestHandler'/*, 'Search'*/, 'Filter.Filter');

public function index() {
$this->set('loci', $this->Locus->find('all'));
}

public function view($id=null) {
if (!$id) {
    throw new NotFoundException(__('Invalid locus'));
    }
  $locus = $this->Locus->find('first',  array(
      'recursive' => 3,
      'conditions' => array('id' => $id),
     'order' => array('DISPLAY_SEQ1_NBR', 'DISPLAY_SEQ2_NBR', 'DISPLAY_SEQ3_NBR'),
      'contain' => array(
	'Find' => array ('Citation', 'DigitalImg', 'Material' ),
	'LocusCoord',
	'LocusCard'=> array('DigitalImg'),
	'ArchLevel' => array(
			'Area' => array(
				  'conditions' => array(
				    'RLTNSHP_TYPE_CD' => 'AC'), 
			 'Site')
			    )
		      )
	));
$this->loadModel('DirectoryInfo');
$dirs = $this->DirectoryInfo->find('all');
//$this->set('dirs', $dirs);
foreach ($dirs as $dir):
$arranged_dirs[$dir['DirectoryInfo']['DIRECTORY_NAME']] = $dir['DirectoryInfo']['DIRECTORY_PATH'];
endforeach;
$this->set('dirs', $arranged_dirs);


$this->set('locus', $locus);

}
}