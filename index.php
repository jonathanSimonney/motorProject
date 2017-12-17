<?php
require_once 'vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;


$publicConfig = Yaml::parse(file_get_contents(__DIR__.'/config/public.yml'));
$privateConfig = Yaml::parse(file_get_contents(__DIR__.'/config/private.yml'));

//we give our orm its configuration AND its information to connect to the database.
$boardGameMotorInterface = new \Motor\HighLevelInterface($publicConfig['motor_config'], $privateConfig['db_config']);

$test = new \Motor\GameManager();
var_dump($test->throwXNSidedDices(3, 6));
