<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Datasource\ConnectionManager;
use Cake\Controller\Component\UserDao;
use Cake\Event\Event;

class UserController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('UserDao');
        
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        // $this->Auth->allow('index');
        // $this->Auth->allow('login');
        // $role = $this->request->session()->read('User.record');
        // if ($role["type"] == 1 && $this->request->getRequestTarget() !='users')  $this->redirect('/users');
    }

    public function index()
    {
       $this->set('users', $this->UserDao->getAll());
    }

    public function delete()
    {
        $data = $this->request->data;
        $this->UserDao->delete($data["id"]);
        return $this->redirect([
                'controller' => 'User',
                'action' => 'index'
        ]);
    }

    public function edit() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data["id"] > 0) $this->UserDao->update($data["id"], $data["name"], $data["password"], $data["type"]);
            else $this->UserDao->insert($data["name"], $data["password"], $data["type"]);
            return $this->redirect([
                'controller' => 'User',
                'action' => 'index'
            ]);
        } else {
            $id = $this->request->getQuery('id');
            $action = $this->request->getQuery('action');
            if ($action != null) {
                $this->set('action', 'delete');
                $user = $this->UserDao->get($id);
                $this->set('user', $user);
            } else {
                if ($id > 0) {
                    $user = $this->UserDao->get($id);
                    $this->set('user', $user);
                } else {
                    $this->set('user', ['name'=>'', 'type'=>'', 'password'=>'', 'id'=>0]);
                }
                $this->set('action', '');
            }
        }
    }
    
}