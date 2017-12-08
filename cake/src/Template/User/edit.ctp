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

// $this->layout = false;

?>

<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
<?php if ($action == ''): ?>
    <form action="/edit" method="post">
      <input type="hidden" name="id" value=<?= h($user["id"]) ?>>
      First name:<br>
      <input type="text" name="name" value=<?= h($user["name"]) ?>>
      <br>
      Pass:<br>
      <input type="text" name="password" value=<?= h($user["password"]) ?>>
      <br><br>
      Type:<br>
      <select name="type">
        <option value="1">Admin</option>
        <option value="2">Sub admin</option>
        <option value="3">User</option>
    </select>
      <br><br>
      <input type="submit" value="Submit">
    </form> 
<?php elseif ($action != ''): ?>
   <p>Id<?= $user['id'] ?></p>
   <p>Name<?= $user['name'] ?></p>
   <p>Role<?= $user['type'] ?></p>
   <form action="/delete" method="post">
     <input type="hidden" name="id" value=<?= h($user["id"]) ?>>
     <input type = "submit" value ="delete">
   </form>
<?php endif; ?>
</body>
</html>


