<?php
class MaterialsController extends AppController {

	var $name = 'Materials';

	function index() {

		$this->set('materials',$this->Material->find('all', array('recursive' => 1)));
		$this->set('title', 'Materials repertoire');
		}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid material', true));
			$this->redirect(array('action' => 'index'));
		}
  $material = $this->Material->find('first',  array(
      'recursive' => 2,
      'conditions' => array('MATERIAL_ID' => $id),
      'contain' => array(
		    'Find' => array ('DigitalImg', 'Idb','FindRegistryInfo', 'MaterialFind'=> array('Material'))
		      )));

					$this->loadModel('DirectoryInfo');
					$dirs = $this->DirectoryInfo->find('all');
					//$this->set('dirs', $dirs);
					foreach ($dirs as $dir):
					$arranged_dirs[$dir['DirectoryInfo']['DIRECTORY_NAME']] = $dir['DirectoryInfo']['DIRECTORY_PATH'];
					endforeach;
					$this->set('dirs', $arranged_dirs);


$this->set('material', $material);
$this->set('title', 'Material: '.$material['Material']['MATERIAL_DESCR']);
	}
/*
	function add() {
		if (!empty($this->data)) {
			$this->Material->create();
			if ($this->Material->save($this->data)) {
				$this->Session->setFlash(__('The material has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The material could not be saved. Please, try again.', true));
			}
		}
		$tablets = $this->Material->Find->find('list');
		$this->set(compact('tablets'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid material', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Material->save($this->data)) {
				$this->Session->setFlash(__('The material has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The material could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Material->read(null, $id);
		}
		$tablets = $this->Material->Find->find('list');
		$this->set(compact('tablets'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for material', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Material->delete($id)) {
			$this->Session->setFlash(__('Material deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Material was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	*/
}
