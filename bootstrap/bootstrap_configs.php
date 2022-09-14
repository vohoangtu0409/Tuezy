<?php
use \Illuminate\Config\Repository;
$configs = new Repository(include ROOT . 'configs.php');
container()->instance('config', $configs);