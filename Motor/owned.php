<?php


namespace Motor;


trait owned
{
    protected $owner;

    public function getOwner()
    {
        return $this->owner;
    }

    public function setOwner($newOwner)
    {
        $this->owner = $newOwner;
    }
}