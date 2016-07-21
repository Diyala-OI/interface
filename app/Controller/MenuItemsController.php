<?php
App::uses('AppController', 'Controller');
class MenuItemsController extends AppController {

public function index() {
$data = $this->MenuItem->generateTreeList(null, null, null);
$this->set('menu', $data);
    }

		public function view($id = null) {
		if (!$this->MenuItem->exists($id)) {
			throw new NotFoundException(__('Invalid menu item'));
		}
		$options = array('conditions' => array('MenuItem.' . $this->MenuItem->primaryKey => $id));
		$this->set('menuItem', $this->MenuItem->find('first', $options));
	}

public function add() {
		if ($this->request->is('post')) {
			$this->MenuItem->create();
			if ($this->MenuItem->save($this->request->data)) {
				$this->Session->setFlash(__('The menu item has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The menu item could not be saved. Please, try again.'));
			}
		}
		$parentMenuItems = $this->MenuItem->ParentMenuItem->find('list');
		$this->set(compact('parentMenuItems'));
	}

public function edit($id = null) {
		if (!$this->MenuItem->exists($id)) {
			throw new NotFoundException(__('Invalid menu item'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MenuItem->save($this->request->data)) {
				$this->Session->setFlash(__('The menu item has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The menu item could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MenuItem.' . $this->MenuItem->primaryKey => $id));
			$this->request->data = $this->MenuItem->find('first', $options);
		}
		$parentMenuItems = $this->MenuItem->ParentMenuItem->find('list');
		$this->set(compact('parentMenuItems'));
	}

	public function delete($id = null) {
		$this->MenuItem->id = $id;
		if (!$this->MenuItem->exists()) {
			throw new NotFoundException(__('Invalid menu item'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MenuItem->delete()) {
			$this->Session->setFlash(__('Menu item deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Menu item was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
