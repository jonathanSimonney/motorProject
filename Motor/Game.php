<?php

namespace Motor;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table(name="game")
 */
class Game extends BaseDoctrineClass
{
    use Savable;

    /**
     * @var GameTurnManager
     *
     * @ORM\OneToOne(targetEntity="GameTurnManager")
     * @sendTo:everyone
     */
    private $turnManager;

    public function __construct(GameTurnManager $gameTurnManager)
    {
        $this->turnManager = $gameTurnManager;
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