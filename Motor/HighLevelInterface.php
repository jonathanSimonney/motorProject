<?php

namespace Motor;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class HighLevelInterface
{
    protected $entityManager;
    protected $gameTurnManager;
    protected $gameFolder;

    public function __construct($publicConfig, $protectedConfig){
        $this->setEntityManager($publicConfig, $protectedConfig);
        $this->gameFolder = $publicConfig['game_folder_path'];
    }

    /**
     * @param $publicConfig
     * @param $protectedConfig
     * @throws \Doctrine\ORM\ORMException
     */
    protected function setEntityManager($publicConfig, $protectedConfig)
    {
        $paths = array($publicConfig['game_folder_path']);
        $isDevMode = false;

// the connection configuration
        $dbParams = $protectedConfig;
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

    public function setupNewGame(GameTurnManager $gameTurnManager)
    {
        $this->gameTurnManager = $gameTurnManager;

        $gameTurnManager->setInitialTurnOrder();
    }
}