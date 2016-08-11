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
  'conditions' => array('id' => $id),
  'recursive' => 3,
  'order' => array('DISPLAY_SEQ1_NBR', 'DISPLAY_SEQ2_NBR', 'DISPLAY_SEQ3_NBR'),
  'contain' => array(
            	'Find' => array ('Citation', 'DigitalImg', 'Material', 'VMFind' ),
            	'LocusCard'=> array('DigitalImg'),
        	     'ArchLevel' => array(
                    'fields' => array('id','SITE_SUBDIV_NM','SITE_SUBDIV_ID', 'DISPLAY_SEQ1_NBR', 'DISPLAY_SEQ2_NBR', 'DISPLAY_SEQ3_NBR'),
                    'Floor' => array(
                            'fields' => array('id','SITE_SUBDIV_NM','SITE_SUBDIV_ID', 'DISPLAY_SEQ1_NBR', 'DISPLAY_SEQ2_NBR', 'DISPLAY_SEQ3_NBR')),
                    'Area' => array(
            				  'conditions' => array(
            				          'RLTNSHP_TYPE_CD' => 'AC'),
            			    'Site')
                    )
            		      )
            	));
$this->loadModel('DirectoryInfo');
$dirs = $this->DirectoryInfo->find('all');
foreach ($dirs as $dir):
$arranged_dirs[$dir['DirectoryInfo']['DIRECTORY_NAME']] = $dir['DirectoryInfo']['DIRECTORY_PATH'];
endforeach;
$this->set('dirs', $arranged_dirs);


$locus['Locus']['name']=null;
if (!is_null($locus['Locus']['SITE_SUBDIV_NM'])){
$locus['Locus']['name'] = ' ('.$locus['Locus']['SITE_SUBDIV_NM'].')';
}
$title= 'Locus '. $locus['Locus']['SQ_H_COORD'].
$locus['Locus']['SQ_V_COORD'].
':'.
$locus['Locus']['LOCUS_NBR'].
$locus['Locus']['name'] .' in area '.$locus['ArchLevel']['0']['Area']['SITE_SUBDIV_ID'].' of '.$locus['ArchLevel']['0']['Site']['SITE_NM'];
$this->set('title',$title);
$this->set('locus', $locus);
}
}
