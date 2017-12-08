<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
                    'loginAction'=> $this->referer(),
                    'viewAction'=>['controller'=>'Login', 'action'=>'view'],
                    'contentAction'=>['controller'=>'Content', 'action'=>'index1'],
                    'userAction'=>['controller'=>'User', 'action'=>'index'],
                    'authorize'=>['Controller'],
                    'authError' => 'Đi ra chỗ khác chơi',
                    'unauthorizedRedirect' => ['controller'=>'User', 'action'=>'index'],
            ]); 
        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Http\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        // Note: These defaults are just to get started quickly with development
        // and should not be used in production. You should instead set "_serialize"
        // in each action as required.
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        // $this->Auth->allow('login');
        if ( $this->request->session()->read('User.record.name') == null) {
            if ($this->request->getRequestTarget() != '/login' && $this->request->is('get')) $this->redirect('/login');
        } else {
            if ($this->request->session()->read('User.record.type') == 1 || $this->request->session()->read('User.record.type') == 2) $this->Auth->allow(['edit','index','view']);
            if ($this->request->session()->read('User.record.type') == 1) $this->Auth->allow('delete');
            if ($this->request->session()->read('User.record.type') == 3) $this->Auth->deny('index');
        }
    }
}
