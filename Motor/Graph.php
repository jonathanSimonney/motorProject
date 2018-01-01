<?php


namespace Motor;


class Graph extends BaseDoctrineClass
{
    protected $arrayNodes;

    public function __construct()
    {
        $this->arrayNodes = [];
    }

    public function addNode(GraphCase $node, $nodeId)
    {
        $node->setNodeId($nodeId);
        $this->arrayNodes[$nodeId] = $node;
    }

    public function removeNode($nodeId)
    {
        if (isset($this->arrayNodes[$nodeId])){
            unset($this->arrayNodes[$nodeId]);
        }
    }

    //todo make a public function addEdgeBetween using the motor class GraphBridge so that user may override this method if they want another class

    public function addEdge(GraphBridge $edge)
    {
        $node1 = &$edge->getNode1();
        $node2 = &$edge->getNode2();

        $node1->addEdge($edge);
        $node2->addEdge($edge);
    }

    public function &getNode($nodeId)
    {
        if (isset($this->arrayNodes[$nodeId])){
            return $this->arrayNodes[$nodeId];
        }
        return null;
    }
}