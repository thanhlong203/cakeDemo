<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Datasource\ConnectionManager;
use Cake\Controller\Component\UserDao;
use Cake\Event\Event;

class LoginController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('UserDao');
        // $this->loadComponent('Auth', [
        // 'loginAction' => [
        //     'controller' => 'Login',
        //     'action' => 'login',
        // ],
        // 'viewAction' => [
        //     'controller' => 'Login',
        //     'action' => 'view',
        // ],
        // 'authorize' => 'controller',
        // 'authError' => 'Did you really think you are allowed to see that?',
        // ]);
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow('login');
        $this->Auth->allow('rest');
        // $this->Auth->deny('login');
    }

    public function login()
    {
      // if (!$this->Auth->loginAction()) {
      //     $this->redirect([
      //   'controller' => 'Login',
      //   'action' => 'view']);
      // }
      // $this->UserDao->insertUser();
      $this->set('color', 'pink');
    }

    public function view()
    {
      $results = $this->UserDao->getUser('Yume', 'sft');
      $this->set('length', $results[0]);
      $result = $results[0];
      $this->request->session()->write('User1.record', $result);
      $User =  $this->request->session()->read('User1.record');
      $this->set('color', 'pink');
      $this->set('user', $User);
    }

    public function rest()
    {
      $data = $this->request->data;
      $userName = $data["username"];
      $password = $data["password"];
      $results = $this->UserDao->getUser($userName, $password);
      if (count($results) > 0) {
        $this->request->session()->write('User.record', $results[0]);
        return $this->redirect([
        'controller' => 'Content',
        'action' => 'index1'
        ]);
      }
      return $this->redirect(['controller' => 'Login', 'action' => 'login']);
    }
}
