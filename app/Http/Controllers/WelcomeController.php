<?php

namespace App\Http\Controllers;
use GraphAware\Neo4j\Client\Client;
use GraphAware\Neo4j\OGM\Manager;
use Illuminate\Routing\Controller as BaseController;
use App\Model\Movie;
use App\Model\Person;
use App\Model\Property;

class WelcomeController extends BaseController
{
    /**
     * @var \GraphAware\Neo4j\OGM\Manager
     */
    protected $em;

    /**
     * @var \GraphAware\Neo4j\Client\Client
     */
    protected $client;

    public function __construct(Manager $em, Client $client)
    {
        $this->em = $em;
        $this->client = $client;
    }

    public function welcome()
    {
        $movies = $this->em->getRepository(Movie::class)->findAll();
        return view('movies', array('movies' => $movies));
    }

    public function movieInfo($id)
    {
        $movie = $this->em->getRepository(Movie::class)->findOneById((int) $id);

        return view('movie', array('movie' => $movie));
    }

    public function actorInfo($id)
    {
        $actor = $this->em->getRepository(Person::class)->findOneById((int) $id);

        return view('actor', array('actor' => $actor));
    }

    public function clickStreamEvent($event, $user, $itemType, $itemId)
    {
        $query = 'MERGE (u:User {id: {uid} })
        MERGE (i:Item {id: {iid} })
        CREATE (u)-[:CLICKED {time: timestamp()}]->(i)';
        $parameters = [
            'uid' => $user,
            'iid' => $itemId
        ];
        $this->client->run($query, $parameters);
    }

    public function propertyList()
    {
        $properties = $this->em->getRepository(Property::class)->findAll(['limit' => 20]);

        return view('properties', array('properties' => $properties));
    }

    public function propertyInfo($id)
    {
        $property = $this->em->getRepository(Property::class)->findOneById((int) $id);

        return view('property', array('property' => $property));
    }

    public function actorsList()
    {
        $s = microtime(true);
        $actors = $this->em->getRepository(Person::class)->findAll();
        echo microtime(true) - $s;

        return view('actors', array('actors' => $actors));
    }
}