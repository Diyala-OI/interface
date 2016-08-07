<?php
class WikiArticlesController extends AppController {
public $name = 'WikiArticles';
public $useDbConfig="wiki";
public $components = array('RequestHandler', 'Search.Prg');
var $helpers = array('Html', 'Form', 'Js');

public function index() {
$this->redirect(array('action' => 'view', 'home'));
}

public function admin_index() {
$this->set('articles', $this->WikiArticle->getAllWikiArticle());
	}

public function admin_sort() {
	$this->set('title', __('Wiki Article'));
	$this->set('description', __('Sort Wiki Articles'));
}

public function admin_getnodes() {
	$this->layout = 'ajax';

	   $parent = isset($this->request->data['node']) ? intval($this->request->data['node']) : 0;

		   if ($parent) {
            $nodes = $this->WikiArticles->children($parent, true);
        } else {
            $conditions = array('WikiArticles.parent_id' => $parent);
						}
	$nodes = $this->WikiArticle->find('all', array('order' => array('WikiArticle.lft' => 'ASC')));
	// send the nodes to our view
	$this->set(compact('nodes'));
}

    function admin_reorder() {
        $this->autoRender = false;
        // retrieve the node instructions from javascript
        // delta is the difference in position (1 = next node, -1 = previous node)

        $node = intval($this->request->data['node']);
        $delta = intval($this->request->data['delta']);

        if ($delta > 0) {
            $this->WikiArticle->moveDown($node, abs($delta));
        } elseif ($delta < 0) {
            $this->WikiArticle->moveUp($node, abs($delta));
        }

        // send success response
        Cache::clear();
        clearCache();
        exit('1');
    }

    function admin_reparent() {
        $this->autoRender = false;

        $node = intval($this->request->data['node']);
        $parent = intval($this->request->data['parent']);
        $position = intval($this->request->data['position']);

        // save the employee node with the new parent id
        // this will move the employee node to the bottom of the parent list

        $this->WikiArticle->id = $node;
				//if ($parent == 0){$parent=null;}
        $property['WikiArticle']['parent_id'] = $parent;
        $this->WikiArticle->save($property);

        // If position == 0, then we move it straight to the top
        // otherwise we calculate the distance to move ($delta).
        // We have to check if $delta > 0 before moving due to a bug
        // in the tree behavior (https://trac.cakephp.org/ticket/4037)

        if ($position == 0) {
            $this->WikiArticle->moveUp($node, true);
        } else {
            $count = $this->WikiArticle->childCount($parent, true);
            $delta = $count - $position - 1;
            if ($delta > 0) {
                $this->WikiArticle->moveUp($node, $delta);
            }
        }

        // send success response
        Cache::clear();
        clearCache();
        exit('1');
    }

		public function view($url) {
    $wikiArticle = $this->WikiArticle->find('first', array('recursive' => 2, 'conditions' => array('WikiArticle.url' => $url)));
$this->set(compact('wikiArticle'));
	$this->set('title', $wikiArticle['WikiArticle']['title']);
		}



	public function admin_add() {
		if ($this->request->is('post')) {
			$this->WikiArticle->create();
			if ($this->WikiArticle->save($this->request->data)) {
				$this->Session->setFlash(__('The wiki article has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The wiki article could not be saved. Please, try again.'));
			}
		}
		 $data = $this->WikiArticle->generateTreeList(null, null, null, '&nbsp;&nbsp;&nbsp;');
		$parentWikiArticles = $this->WikiArticle->generateTreeList();
		$this->set(compact('parentWikiArticles'));
		  $authors = $this->WikiArticle->Author->find('list',array('fields'=>array('id','last_name')));
        $this->set(compact('authors'));
	}

	public function admin_edit($id = null) {
		if (!$this->WikiArticle->exists($id)) {
			throw new NotFoundException(__('Invalid wiki article'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
		if ($this->WikiArticle->save($this->request->data)) {
				$this->Session->setFlash(__('The wiki article has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The wiki article could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('WikiArticle.' . $this->WikiArticle->primaryKey => $id));
			$this->request->data = $this->WikiArticle->find('first', $options);
		}
		$parentWikiArticles = $this->WikiArticle->_generateTreeList();
     $this->set(compact('parentWikiArticles'));
		  $authors = $this->WikiArticle->Author->find('list',array('fields'=>array('id','last_name')));
        $this->set(compact('authors'));
	}

public function admin_delete($id = null) {
		$this->WikiArticle->id = $id;
		if (!$this->WikiArticle->exists()) {
			throw new NotFoundException(__('Invalid wiki article'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->WikiArticle->delete()) {
			$this->Session->setFlash(__('Wiki article deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Wiki article was not deleted'));
		$this->redirect(array('action' => 'index'));
	}



 public function find() {
        $this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->Article->parseCriteria($this->Prg->parsedParams());
        $this->set('articles', $this->Paginator->paginate());
    }


public function isAuthorized($user) {
    if ($this->action === 'view') {
        return true;
    }

   return AppController::isAuthorized($user);
}

public function admin_publish($id) {
if ($id) {
	 $this->WikiArticle->id = $id;
	 $wikiArticle = $this->WikiArticle->find('first', array('conditions' => array('WikiArticle.id' => $id)));
	if ($wikiArticle['WikiArticle']['published'] == 1){
		$this->WikiArticle->saveField('published', 0);
		$pub_status = 'unpublished';
		}
	else{
		$this->WikiArticle->saveField('published', 1);
		$pub_status = 'published';
		}
$this->Session->setFlash(__('The wiki article has been '.$pub_status));
$this->redirect(array('action' => 'index'));
}
}
    public function get_menu_categories(){
        $this->autoRender  = false;

        $alias = $this->categoryAlias;
        $categories = Cache::read('get_menu_categories_'.$alias);
        if(empty($categories)){
            $conditions = array('WikiArticle.published'=>1);
            if($alias){
                $conditions['WikiArticle.alias'] = $alias;
            }else{
                $conditions[] = 'WikiArticle.alias IS NULL';
            }
            $categories = $this->WikiArticle->find('threaded', array('order'=>array('WikiArticle.lft'=>'ASC'),'conditions'=>$conditions));
            Cache::write('get_menu_categories', $categories);
        }

        return $categories;
    }
    public function admin_toggle($id, $status, $field = 'published') {
        $this->autoRender = false;

        if ($id) {
            $status = ($status) ? 0 : 1;
            $data['WikiArticle'] = array('id' => $id, $field => $status);
            if ($this->WikiArticle->saveAll($data['WikiArticle'], array('validate' => false))) {
                $link = ($this->base) ? FULL_BASE_URL .$this->base.'/' : '/';
                $plugin = Inflector::underscore($this->plugin);
                $url = $link.'/admin/'. $plugin . '/' . Inflector::tableize($this->name) . '/toggle/' . $id . '/' . $status . '/' . $field;
                $src = $link.$plugin. '/img/allow-' . $status . '.png';

                return "<img id=\"status-{$id}\" onclick=\"published.toggle('status-{$id}', '{$url}');\" src=\"{$src}\">";
            }
        }

        return false;
    }
}
