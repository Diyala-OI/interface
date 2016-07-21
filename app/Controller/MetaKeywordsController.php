<?php
App::uses('AppController', 'Controller');
/**
 * MetaKeywords Controller
 *
 * @property MetaKeyword $MetaKeyword
 */
class MetaKeywordsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MetaKeyword->recursive = 0;
		$this->set('metaKeywords', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MetaKeyword->exists($id)) {
			throw new NotFoundException(__('Invalid meta keyword'));
		}
		$options = array('conditions' => array('MetaKeyword.' . $this->MetaKeyword->primaryKey => $id));
		$this->set('metaKeyword', $this->MetaKeyword->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MetaKeyword->create();
			if ($this->MetaKeyword->save($this->request->data)) {
				$this->Session->setFlash(__('The meta keyword has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The meta keyword could not be saved. Please, try again.'));
			}
		}
		$wikiArticles = $this->MetaKeyword->WikiArticle->find('list');
		$this->set(compact('wikiArticles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->MetaKeyword->exists($id)) {
			throw new NotFoundException(__('Invalid meta keyword'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MetaKeyword->save($this->request->data)) {
				$this->Session->setFlash(__('The meta keyword has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The meta keyword could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MetaKeyword.' . $this->MetaKeyword->primaryKey => $id));
			$this->request->data = $this->MetaKeyword->find('first', $options);
		}
		$wikiArticles = $this->MetaKeyword->WikiArticle->find('list');
		$this->set(compact('wikiArticles'));
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
		$this->MetaKeyword->id = $id;
		if (!$this->MetaKeyword->exists()) {
			throw new NotFoundException(__('Invalid meta keyword'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MetaKeyword->delete()) {
			$this->Session->setFlash(__('Meta keyword deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Meta keyword was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
