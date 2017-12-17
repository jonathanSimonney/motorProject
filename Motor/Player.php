<?php

namespace Motor;


use Doctrine\ORM\Mapping\OneToMany;

class Player
{
    /**
     * @var array[Action]
     * @param OneToMany Action
     * @sendTo:everyone
     */
    private $availableActions;

    public function removeAvailableAction(Action $action)
    {
        $this->availableActions = array_diff($this->availableActions, [$action]);
    }

    public function addAvailableAction(Action $action)
    {
        $this->availableActions[] = $action;
    }

    /**
     * @return mixed
     */
    public function getAvailableActions()
    {
        return $this->availableActions;
    }

    /**
     * @param mixed $availableActions
     */
    public function setAvailableActions($availableActions)
    {
        $this->availableActions = $availableActions;
    }
}