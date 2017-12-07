<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class CheckLoginComponent extends Component
{
    public function islogin()
    {
        return $this->request->session()->read('User.record') == null;
    }
    
}