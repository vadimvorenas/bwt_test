<?php

include_once '../vendor/autoload.php';
include_once '../autoload.class.php';

use Scr\Core;

session_start();

$db = new Core\DB();
$db = $db->connect();