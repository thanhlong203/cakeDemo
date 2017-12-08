<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\ORM\Query;

class UserTable extends Table
{

    public function initialize(array $config)
    {
        // $this->setTable('user');

        // Prior to 3.4.0
        $this->table('sft.user');
    }

    public function findId(Query $query, array $options)
    {
        $id = $options['id'];
        return $query->where(['id' => $id])->first();
    }

    // public function findId(Query $query, array $options)
    // {
    //     $id = $options['id'];
    //     return $query->where(['id' => $id])->first();
    // }

    public function findAll(Query $query, array $options)
    {
        return $query->toArray();
    }

}