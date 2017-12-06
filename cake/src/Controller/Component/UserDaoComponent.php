<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Datasource\ConnectionManager;
use Cake\Controller\Component\Dao;

class UserDaoComponent extends DaoComponent
{
    public function get($id)
    {
        $connection = $this->getConnection();
        $results = $connection
            ->execute('SELECT * FROM user WHERE id = :id', ['id' => $id])
            ->fetchAll('assoc');
        return $results;
    }
    
    public function getUser($name, $pass)
    {
        $connection = $this->getConnection();
        $results = $connection
            ->execute('SELECT * FROM user WHERE name = :name and password = :password', ['name' => $name, 'password' => $pass])
            ->fetchAll('assoc');
        return $results;
    }

}