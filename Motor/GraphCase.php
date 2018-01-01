<?php

namespace Motor;


class GraphCase extends BaseDoctrineClass
{
    protected $edges;
    protected $nodeId;

    public function removeEdge(GraphBridge $edge)
    {
        $this->edges = array_values(array_diff($this->edges, [$edge]));
    }

    public function addEdge(GraphBridge $edge)
    {
        $this->edges[] = $edge;
    }

    /**
     * @return mixed
     */
    public function getEdges()
    {
        return $this->edges;
    }

    public function getLinkedNodes()
    {
        $ret = [];

        foreach ($this->edges as $edge)
        {
            /** @var $edge GraphBridge */
            $copy = &$edge->getOtherNode($this);
            $ret[] = clone $copy;
        }

        return $ret;
    }

    /**
     * @return mixed
     */
    public function getNodeId()
    {
        return $this->nodeId;
    }

    /**
     * @param mixed $nodeId
     */
    public function setNodeId($nodeId): void
    {
        $this->nodeId = $nodeId;
    }
}