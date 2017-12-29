<?php


namespace Motor;


class BaseDoctrineClass
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @return int
     */
    final public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    final public function setId($id)
    {
        $this->id = $id;
    }
}