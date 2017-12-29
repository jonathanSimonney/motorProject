<?php

namespace Motor;


use Doctrine\ORM\Mapping as ORM;

trait Savable
{
    /**
     * @ORM\Column(type="string")
     */
    private $saveName;

    /**
     * @ORM\Column(type="datetime")
     */
    private $saveDate;

    /**
     * @return mixed
     */
    public function getSaveName()
    {
        return $this->saveName;
    }

    /**
     * @param mixed $saveName
     */
    public function setSaveName($saveName): void
    {
        $this->saveName = $saveName;
    }

    /**
     * @return mixed
     */
    public function getSaveDate()
    {
        return $this->saveDate;
    }

    /**
     * @param mixed $saveDate
     */
    public function setSaveDate($saveDate): void
    {
        $this->saveDate = $saveDate;
    }
}