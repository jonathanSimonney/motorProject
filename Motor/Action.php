<?php

namespace Motor;


interface Action
{
    public function execute(Player $player, $additionalParams=null);
}