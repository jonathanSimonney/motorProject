<?php

namespace Motor;


class Stack
{
    /**
     * @var array
     */
    private $stackContent;

    public function removeCard($card)
    {
        $this->stackContent = array_values(array_diff($this->stackContent, [$card]));
    }

    public function addCard($card)
    {
        $this->stackContent[] = $card;
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