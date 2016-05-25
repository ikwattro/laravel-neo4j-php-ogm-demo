<?php

namespace App\Model;

use GraphAware\Neo4j\OGM\Annotations as OGM;

/**
 * Class Property
 * @package App\Model
 *
 * @OGM\Node(label="Property")
 */
class Property
{
    /**
     * @OGM\GraphId()
     */
    protected $id;

    /**
     * @OGM\Property(type="string")
     */
    protected $title;

    /**
     * @OGM\Property(type="string")
     */
    protected $description;

    /**
     * @OGM\Property(type="string")
     */
    protected $location;

    /**
     * @OGM\Relationship(relationshipEntity="Rating", direction="OUTGOING", type="HAS_SCORE", collection=true)
     */
    protected $score;

    /**
     * @OGM\Relationship(targetEntity="Country", type="IN_COUNTRY", direction="OUTGOING", collection=true)
     */
    protected $country;

    /**
     * @OGM\Property(type="string")
     */
    protected $imgage;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country[0];
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->imgage;
    }


}