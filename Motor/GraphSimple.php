<?php
/**
 * Created by PhpStorm.
 * User: Florent
 * Date: 29/12/*/

namespace Motor;

/** cette classe correspond à un graph simple type jeu des petits chevaux */

class GraphSimple
{
    protected $node1;
    protected $node2;
    protected $edge;
    protected $position;

    public function changeNode($node1, $edge, $position, $node2)
    {
        $edge = count($node1) - 1;
        if ($position == $edge)
        {
            $position = $node2[0];
        }
        return $position;
    }

}