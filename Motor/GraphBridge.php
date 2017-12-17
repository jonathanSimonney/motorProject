<?php

namespace Motor;


class GraphBridge
{
    private $node1;
    private $node2;
    private $direction;

    public function __construct(GraphCase $node1, GraphCase $node2, String $direction)
    {
        $this->node1 = $node1;
        $this->node2 = $node2;
        $this->direction = $direction;
        $this->checkDirectionIsValid();
    }

    private function checkDirectionIsValid()
    {
        if ($this->direction !== 'bidirectional' && $this->direction !== '1To2'&& $this->direction !== '2To1'){
            throw new \InvalidArgumentException('The direction argument must be one of : \'bidirectional\', \'1To2\', \'2To1\'.');
        }
    }

    /**
     * @return String
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * @return GraphCase
     */
    public function getNode1()
    {
        return $this->node1;
    }

    /**
     * @return GraphCase
     */
    public function getNode2()
    {
        return $this->node2;
    }

    public function getOtherNode(GraphCase $oneNode)
    {
        if ($this->node1 === $oneNode)
        {
            return $this->node2;
        }

        return $this->node1;
    }
}