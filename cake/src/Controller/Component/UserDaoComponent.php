<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Datasource\ConnectionManager;
use Cake\Controller\Component\Dao;
use Cake\ORM\TableRegistry;

class UserDaoComponent extends DaoComponent
{
    public function get($id)
    {
        $user = TableRegistry::get('user');
        return $user->find('id', ['id' => $id]);
        // $connection = $this->getConnection();
        // $results = $connection
        //     ->execute('SELECT * FROM user WHERE id = :id', ['id' => $id])
        //     ->fetchAll('assoc');
        // return $results[0];
    }

    public function getAll()
    {
        $user = TableRegistry::get('user');
        // $connection = $this->getConnection();
        // $results = $connection
        //     ->execute('SELECT * FROM user')
        //     ->fetchAll('assoc');
        // return $results;
        return $user->find("all", []);
    }

    public function getUser($name, $pass)
    {
        $connection = $this->getConnection();
        $results = $connection
            ->execute('SELECT * FROM user WHERE name = :name and password = :password', ['name' => $name, 'password' => $pass])
            ->fetchAll('assoc');
        return $results;
    }

    public function insert($name, $password, $type)
    {
        $connection = $this->getConnection();
        $connection
            ->execute('INSERT INTO user (name, password, type) VALUE (:name, :password, :type)', ['name' => $name, 'password' => $password, 'type'=>$type]);
    }

    public function update($id, $name, $password, $type)
    {
        $connection = $this->getConnection();
        $connection
            ->execute('UPDATE user SET name = :name, password = :password, type = :type WHERE id = :id', ['name' => $name, 'password' => $password, 'type'=>$type, 'id' => $id]);
    }

    public function delete($id)
    {
        $connection = $this->getConnection();
        $connection
            ->execute('DELETE FROM user  WHERE id = :id', ['id' => $id]);
    }



    // public function getUserById($id)
    // {
    //     $users = TableRegistry::get('Users');
    //     return $users->findById(2);
    // }

}