<?php


namespace Motor;


class GameManager
{
    public function throwXNSidedDices($nbDices, $nbFaces)
    {
        $ret = [];
        for ($i=0; $i<$nbDices; $i++) {
            $ret[] = random_int(1, $nbFaces);
        }

        return $ret;
    }
}