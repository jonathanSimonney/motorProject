<?php

namespace Motor;


use Doctrine\ORM\Mapping\OneToMany;

class Player extends BaseDoctrineClass
{
    /**
     * @var array[Action]
     * @param OneToMany Action
     * @sendTo:everyone
     */
    protected $availableActions;

    public function removeAvailableAction(Action $action)
    {
        $this->availableActions = array_values(array_diff($this->availableActions, [$action]));
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