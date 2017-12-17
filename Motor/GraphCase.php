<?php

namespace Motor;


class GraphCase
{
    private $edges;

    public function removeEdge(GraphBridge $edge)
    {
        $this->edges = array_diff($this->edges, [$edge]);
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
            $ret[] = $edge->getOtherNode($this);
        }

        return $ret;
    }
}