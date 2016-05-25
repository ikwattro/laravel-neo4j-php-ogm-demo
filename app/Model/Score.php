<?php

namespace App\Model;

use GraphAware\Neo4j\OGM\Annotations as OGM;

/**
 * Class Score
 * @package App\Model
 *
 * @OGM\Node(label="Score")
 */
class Score
{
    /**
     * @OGM\GraphId()
     */
    protected $id;

    /**
     * @OGM\Property(type="int")
     */
    protected $value;

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
    public function getValue()
    {
        return $this->value;
    }
}