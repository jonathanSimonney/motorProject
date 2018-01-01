<?php
require_once 'vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

$publicConfig = Yaml::parse(file_get_contents(__DIR__.'/config/public.yml'));
$privateConfig = Yaml::parse(file_get_contents(__DIR__.'/config/private.yml'));

//we give our orm its configuration AND its information to connect to the database.
$boardGameMotorInterface = new \Motor\HighLevelInterface($publicConfig['motor_config'], $privateConfig['db_config']);

$graph = new \Motor\Graph();
$case1 = new \Motor\GraphCase();
$case2 = new \Motor\GraphCase();
$case3 = new \Motor\GraphCase();
$graph->addNode($case1, 1);
$graph->addNode($case2, 2);
$graph->addNode($case3, 3);

$temp = new \Motor\GraphBridge($case1, $case2);
$graph->addEdge($temp);
$temp = new \Motor\GraphBridge($case2, $case3);
$graph->addEdge($temp);

$testedNode = &$graph->getNode(2);
var_dump($testedNode->getLinkedNodes());

$testedNode->getLinkedNodes()[0]->setNodeId(2);

var_dump($testedNode->getLinkedNodes());
