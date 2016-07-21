<?php
App::uses('AppController', 'Controller');
/**
 * AuthorTitles Controller
 *
 * @property AuthorTitle $AuthorTitle
 */
class AuthorTitlesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AuthorTitle->recursive = 0;
		$this->set('authorTitles', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AuthorTitle->exists($id)) {
			throw new NotFoundException(__('Invalid author title'));
		}
		$options = array('conditions' => array('AuthorTitle.' . $this->AuthorTitle->primaryKey => $id));
		$this->set('authorTitle', $this->AuthorTitle->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AuthorTitle->create();
			if ($this->AuthorTitle->save($this->request->data)) {
				$this->Session->setFlash(__('The author title has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The author title could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AuthorTitle->exists($id)) {
			throw new NotFoundException(__('Invalid author title'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AuthorTitle->save($this->request->data)) {
				$this->Session->setFlash(__('The author title has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The author title could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AuthorTitle.' . $this->AuthorTitle->primaryKey => $id));
			$this->request->data = $this->AuthorTitle->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AuthorTitle->id = $id;
		if (!$this->AuthorTitle->exists()) {
			throw new NotFoundException(__('Invalid author title'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AuthorTitle->delete()) {
			$this->Session->setFlash(__('Author title deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Author title was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * adm_index method
 *
 * @return void
 */
	public function adm_index() {
		$this->AuthorTitle->recursive = 0;
		$this->set('authorTitles', $this->paginate());
	}

/**
 * adm_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function adm_view($id = null) {
		if (!$this->AuthorTitle->exists($id)) {
			throw new NotFoundException(__('Invalid author title'));
		}
		$options = array('conditions' => array('AuthorTitle.' . $this->AuthorTitle->primaryKey => $id));
		$this->set('authorTitle', $this->AuthorTitle->find('first', $options));
	}

/**
 * adm_add method
 *
 * @return void
 */
	public function adm_add() {
		if ($this->request->is('post')) {
			$this->AuthorTitle->create();
			if ($this->AuthorTitle->save($this->request->data)) {
				$this->Session->setFlash(__('The author title has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The author title could not be saved. Please, try again.'));
			}
		}
	}

/**
 * adm_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function adm_edit($id = null) {
		if (!$this->AuthorTitle->exists($id)) {
			throw new NotFoundException(__('Invalid author title'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AuthorTitle->save($this->request->data)) {
				$this->Session->setFlash(__('The author title has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The author title could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AuthorTitle.' . $this->AuthorTitle->primaryKey => $id));
			$this->request->data = $this->AuthorTitle->find('first', $options);
		}
	}

/**
 * adm_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function adm_delete($id = null) {
		$this->AuthorTitle->id = $id;
		if (!$this->AuthorTitle->exists()) {
			throw new NotFoundException(__('Invalid author title'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AuthorTitle->delete()) {
			$this->Session->setFlash(__('Author title deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Author title was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
