<?php

namespace App\Model;

use GraphAware\Neo4j\OGM\Annotations as OGM;

/**
 * Class Rating
 * @package App\Model
 *
 * @OGM\RelationshipEntity(type="HAS_SCORE")
 */
class Rating
{
    /**
     * @OGM\GraphId()
     */
    protected $id;

    /**
     * @OGM\StartNode(targetEntity="Property")
     */
    protected $property;

    /**
     * @OGM\EndNode(targetEntity="Score")
     */
    protected $score;

    /**
     * @OGM\Property(type="float")
     */
    protected $final_score;
}