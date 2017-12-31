<?php

namespace Motor;


use Doctrine\ORM\Mapping\OneToMany;

class GameTurnManager extends BaseDoctrineClass
{
    /**
     * @var Stack
     * @param OneToMany Player
     * @sendTo:everyone
     */
    protected $turnOrder;

    /**
     * @var Player
     */
    protected $currentPlayer;

    /**
     * @var Player
     */
    protected $lastPlayer;

    public function __construct($nbPlayers, $playerClass)
    {
        $this->turnOrder = new Stack(Player::class);
        for ($i=0;$i<$nbPlayers;$i++){
            $this->turnOrder->addCard(new $playerClass());
        }
    }

    public function onPlayerTurnBegin(Player $currentPlayer)
    {}

    public function onPlayerTurnEnd(Player $olderPlayer, Player $newerPlayer)
    {}

    public function onTurnEnd()
    {}

    public function onTurnBegin()
    {
        $this->setLastPlayerAuto();
    }

    public function setInitialTurnOrder()
    {
        $this->turnOrder->shuffleStack();
        $this->currentPlayer = &$this->turnOrder->drawCard(false);
        $this->onTurnBegin();

        $this->onPlayerTurnBegin($this->currentPlayer);
    }

    public function doNextPlayerTurn()
    {
        $nextPlayer = &$this->turnOrder->drawCard(false);

        $this->onPlayerTurnEnd($this->currentPlayer, $nextPlayer);

        if ($this->currentPlayer === $this->lastPlayer){
            $this->onTurnEnd();
            $this->onTurnBegin();
        }
        $this->currentPlayer = $nextPlayer;
        $this->onPlayerTurnBegin($this->currentPlayer);
    }

    /**
     * @return Stack
     */
    public function getTurnOrder()
    {
        return $this->turnOrder;
    }

    /**
     * @param Stack $turnOrder
     */
    public function setTurnOrder(Stack $turnOrder): void
    {
        $this->turnOrder = $turnOrder;
    }

    protected function setLastPlayerAuto()
    {
        $this->lastPlayer = $this->turnOrder->drawFromBottom(false);
    }
}