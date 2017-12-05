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
      $results = $this->UserDao->get(1);
      $this->set('length', $results[0]["name"]);
      $this->set('color', 'pink');
    }

    public function rest()
    {
      $data = $this->request->data;
      $userName = $data["username"];
      return $this->redirect([
      'controller' => 'Login',
      'action' => 'login',
      '?' => [
          'username' => $userName
      ],
]);
    }
}
