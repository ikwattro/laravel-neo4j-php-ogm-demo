<?php

namespace App\Model;

use Doctrine\Common\Collections\ArrayCollection;
use GraphAware\Neo4j\OGM\Annotations as OGM;

/**
 * @OGM\Node(label="Person")
 */
class Person
{
    /**
     * @OGM\GraphId()
     */
    protected $id;

    /**
     * @OGM\Property(type="string")
     */
    protected $name;

    /**
     * @OGM\Property(type="int")
     */
    protected $born;

    /**
     * @var Role[]|\Doctrine\Common\Collections\ArrayCollection
     * @OGM\Relationship(relationshipEntity="Role", type="ACTED_IN", direction="OUTGOING", collection=true)
     */
    protected $acts;

    public function __construct($name)
    {
        $this->acts = new ArrayCollection();
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getBorn()
    {
        return $this->born;
    }

    /**
     * @param mixed $born
     */
    public function setBorn($born)
    {
        $this->born = $born;
    }

    public function getActs()
    {
        return $this->acts;
    }
}