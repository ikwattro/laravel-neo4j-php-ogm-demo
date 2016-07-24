<?php

namespace App\Model;

use Doctrine\Common\Collections\ArrayCollection;
use GraphAware\Neo4j\OGM\Annotations as OGM;

/**
 * @OGM\Node(label="Movie")
 */
class Movie
{
    /**
     * @OGM\GraphId()
     */
    protected $id;

    /**
     * @OGM\Property(type="string")
     * @var string
     */
    protected $title;

    /**
     * @OGM\Property(type="int")
     * @var int
     */
    protected $releaseYear;

    /**
     * @var Role[]|ArrayCollection
     *
     * @OGM\Relationship(relationshipEntity="Role", direction="INCOMING", collection=true, mappedBy="movie")
     */
    protected $actors;

    public function __construct($title, $year = null)
    {
        $this->title = $title;
        $this->releaseYear = $year;
        $this->actors = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getReleaseYear()
    {
        return $this->releaseYear;
    }

    public function setReleaseYear($year)
    {
        $this->releaseYear = $year;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getActors()
    {
        return $this->actors;
    }
}