<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Datasource\ConnectionManager;
use Cake\Controller\Component\UserDao;

class LoginController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('UserDao');
    }

    public function login()
    {
      $results = $this->UserDao->getUser('long', 'long');
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
        'action' => 'index'
        ]);
      }
      return $this->redirect([
        'controller' => 'Login',
        'action' => 'login'
      ]);
    }
}
