<?php

include_once '../vendor/autoload.php';
include_once '../autoload.class.php';

use Scr\Model\Parse;

//var_dump(file_get_contents('https://www.gismeteo.ua/weather-zaporizhia-5093/'));

$http = file_get_contents('https://www.gismeteo.ua/weather-zaporizhia-5093/');
echo Parse::parse($http, '<div class="temp">', '<span class="meas">');

