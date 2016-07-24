<?php

namespace App\Model;

use GraphAware\Neo4j\OGM\Annotations as OGM;

/**
 * Class Role
 * @package App\Model
 *
 * @OGM\RelationshipEntity(type="ACTED_IN")
 */
class Role
{
    /**
     * @var int
     * @OGM\GraphId()
     */
    protected $id;

    /**
     * @var Person
     *
     * @OGM\StartNode(targetEntity="Person")
     */
    protected $actor;

    /**
     * @var Movie
     * @OGM\EndNode(targetEntity="Movie")
     */
    protected $movie;

    /**
     * @var array
     * @OGM\Property(type="array")
     */
    protected $roles;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Person
     */
    public function getActor()
    {
        return $this->actor;
    }

    /**
     * @return Movie
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }


}