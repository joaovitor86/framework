<?php

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_BASE','sistema');

define('DS','/');
define('ROOT', './');
define('CSS', ROOT.DS.'assets'.DS.'css');
define('IMG', ROOT.DS.'assets'.DS.'img');
define('JS', ROOT.DS.'assets'.DS.'js');

require 'system/autoload.php';

$fw = new Engine();