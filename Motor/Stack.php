<?php

namespace Motor;


class Stack
{
    /**
     * @var array
     */
    private $stackContent;

    private $type;

    public function __construct(String $stackType)
    {
        $this->type = $stackType;
    }

    protected function checkCardIsValid($card)
    {
        if (!is_a($card, $this->type)){
            throw new \InvalidArgumentException('You need to pass a card of type '.$this->type.'in this stack.');
        }
    }

    public function removeCard($card)
    {
        $this->checkCardIsValid($card);
        $this->stackContent = array_values(array_diff($this->stackContent, [$card]));
    }

    public function addCard($card)
    {
        $this->checkCardIsValid($card);
        throw new \InvalidArgumentException('You need to pass a card of type '.$this->type.'in this stack.');
    }

    /**
     * @return array
     */
    public function getStackContent()
    {
        return $this->stackContent;
    }

    /**
     * @param array $stackContent
     */
    public function setStackContent(array $stackContent)
    {
        array_walk($stackContent, function ($arrayItem){
            $this->checkCardIsValid($arrayItem);
        });
        $this->stackContent = $stackContent;
    }

    public function drawCard()
    {
        $ret = $this->stackContent[0];

        $this->removeCard($ret);
        return $ret;
    }

    public function shuffleStack()
    {
        $newStack = array();
        $stackSize = \count($this->stackContent);

        for ($i=0; $i<$stackSize; $i++) {
            $randomIndex = random_int(0, $stackSize-$i-1);
            $newElem = $this->stackContent[$randomIndex];
            $this->removeCard($newElem);
            $newStack[] = $newElem;
        }

        $this->stackContent = $newStack;
    }
}