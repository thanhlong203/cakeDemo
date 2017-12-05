<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Datasource\ConnectionManager;

class DaoComponent extends Component
{
    public function getConnection()
    {
      return $connection = ConnectionManager::get('default');
    }


}