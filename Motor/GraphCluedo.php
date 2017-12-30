<?php
/**
 * Created by PhpStorm.
 * User: Florent
 * Date: 29/12/2017
 * Time: 04:45
 */

namespace Motor;


class GraphCluedo
{
    protected $arrayNodes;
    protected $position;
    protected $edge;

    public function changeNode($arrayNodes, $edge, $position) {

        $arrayNodes = array{
            nodes1,             /** the variable ArrayNodes is a multidimensional array containing all the arrays nodes */
            nodes2
        };
        $edge = count($arrayNodes[0]) - 1;      /** all rooms in the Cluedo graph have doors on the first case,
                                                * so all their nodes must have edge at the first value */
        if ($position == $edge)
        {
            $position = $arrayNodes[1][0];
        }
    return $position;
}



}