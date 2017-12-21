<?php


namespace Motor;


class Graph
{
    protected $arrayNodes;

    public function __construct()
    {
        $this->arrayNodes = [];
    }

    public function addNode(GraphCase $node)
    {
        $this->arrayNodes[] = $node;
    }

    public function removeNode(GraphCase $node)
    {
        $this->arrayNodes = array_values(array_diff($this->arrayNodes, [$node]));
    }

    public function addEdge(GraphBridge $edge)
    {
        $node1 = $edge->getNode1();
        $node2 = $edge->getNode2();

        $node1->addEdge($edge);
        $node2->addEdge($edge);
    }
}