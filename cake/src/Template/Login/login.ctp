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
<form action="/login/rest" method="post">
  First name:<br>
  <input type="text" name="username">
  <br>
  Last name:<br>
  <input type="text" name="password">
  <br><br>
  <input type="submit" value="Submit">
</form> 
</body>
</html>


