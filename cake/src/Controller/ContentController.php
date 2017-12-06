<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Datasource\ConnectionManager;
use Cake\Controller\Component\UserDao;

class ContentController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('UserDao');
    }

    public function index()
    {
      $User =  $this->request->session()->read('User.record');
       $this->set('user', $User);
    }

    // public function rest()
    // {
    //   $data = $this->request->data;
    //   $userName = $data["username"];
    //   $password = $data["password"];
    //   $results = $this->UserDao->getUser($userName, $password);
    //   if (count($results) > 0) {
    //     $this->Session->write('User',$results[0]);
    //     return $this->redirect([
    //     'controller' => 'Login',
    //     'action' => 'login'
    //     ]);
    //   }
    //   return $this->redirect([
    //     'controller' => 'Login',
    //     'action' => 'login'
    //   ]);
    // }
}