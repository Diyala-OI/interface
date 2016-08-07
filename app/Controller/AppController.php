<?php
//App::uses('Controller');
class AppController extends Controller {

public $components = array(/*'Security', 'DebugKit.Toolbar',*/ 'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'wiki_articles',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'wiki_articles',
                'action' => 'index',
                'home'
            ),'authorize' => array('Controller')
        ));

public $helpers = array( 'Tinymce');

public function isAuthorized($user) {
    //Admin can access every action
   if (isset($user['role']) && $user['role'] === 'admin') {
        return true;
   }

  //  Default deny
    return false;
}
function beforeRender(){
$this->loadModel('WikiArticle');
$menu_wiki = $this->WikiArticle->find('threaded');
$this->set('menu_wiki', $menu_wiki);

$this->loadModel('MenuItem');
$menu = $this->MenuItem->find('threaded');
$this->set('menu', $menu);

 }
public function beforeFilter() {
 $this->Auth->allow('index', 'view', 'getnodes','reparent', 'reorder','sort' );
 }
}
