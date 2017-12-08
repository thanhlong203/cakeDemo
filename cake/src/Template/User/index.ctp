<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;


?>

<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
<?= $this->Html->link('Add', ['controller' => 'User', 'action' => 'edit']) ?>
<table>
<tr>
<td>Id</td>
<td>Name</td>
<td>Type</td>
<td></td>
</tr>
<?php foreach ($users as $item): ?>
<tr>
    <td><?= $item["id"] ?></td>
    <td><?= $item["name"] ?></td>
    <td><?= $item["type"] ?></td>
    <td><?= $this->Html->link('Edit', ['controller' => 'User', 'action' => 'edit', '?'=> ['id'=>$item["id"]]]) ?></td>
    <td><?= $this->Html->link('Delete', ['controller' => 'User', 'action' => 'edit', '?'=> ['id'=>$item["id"],'action'=>'delete']]) ?></td>
</tr>
<?php endforeach; ?>
</table>

</body>
</html>
