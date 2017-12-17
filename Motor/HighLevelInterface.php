<?php

namespace Motor;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class HighLevelInterface
{
    private $entityManager;

    public function __construct($publicConfig, $privateConfig){
        $this->setEntityManager($publicConfig, $privateConfig);
    }

    /**
     * @param $publicConfig
     * @param $privateConfig
     * @throws \Doctrine\ORM\ORMException
     */
    private function setEntityManager($publicConfig, $privateConfig)
    {
        $paths = array($publicConfig['game_folder_path']);
        $isDevMode = false;

// the connection configuration
        $dbParams = $privateConfig;
        $dbParams['driver'] = 'pdo_mysql';

        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
        $entityManager = EntityManager::create($dbParams, $config);

        $this->entityManager = $entityManager;
    }

    public function executeAction(Player $player, Action $action, $additionalParams=null)
    {
        if (\in_array($action, $player->getAvailableActions(), true)){
            $action->execute($player, $additionalParams);
        }else{
            throw new \InvalidArgumentException('This action can\'t be done by this player!');
        }
    }
}