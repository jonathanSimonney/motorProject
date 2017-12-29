<?php

namespace Motor;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table(name="game")
 */
abstract class Game
{
    /**
     * @var GameTurnManager
     *
     * @ORM\OneToOne(targetEntity="GameTurnManager")
     * @sendTo:everyone
     */
    private $turnManager;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $gameId;

    /**
     * @return int
     */
    public function getGameId()
    {
        return $this->gameId;
    }

    /**
     * @param int $gameId
     */
    public function setGameId($gameId)
    {
        $this->gameId = $gameId;
    }

    /**
     * @return GameTurnManager
     */
    public function getTurnManager(): GameTurnManager
    {
        return $this->turnManager;
    }

    /**
     * @param GameTurnManager $turnManager
     */
    public function setTurnManager(GameTurnManager $turnManager): void
    {
        $this->turnManager = $turnManager;
    }
}