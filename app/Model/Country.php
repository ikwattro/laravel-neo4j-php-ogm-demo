<?php

namespace App\Model;

use GraphAware\Neo4j\OGM\Annotations as OGM;

/**
 * Class Country
 * @package App\Model
 *
 * @OGM\Node(label="Country")
 */
class Country
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
     * @return mixed
     */
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
}